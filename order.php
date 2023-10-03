<?php

function createOrder()
{
    $cart = getCartItems();
    $total = $cart['total'];
    unset($cart['total']);

    try {
        DB::connect()->beginTransaction();

        updateUserBalance(userId(), $total);
        $orderId = insertOrder(userId(), $total);
        setProductsToOrder($orderId, $cart);

        DB::connect()->commit();

        updateCart([]);
        notify('Your order was created!');
        redirect();
    } catch (PDOException|Exception $exception) {
        DB::connect()->rollBack();
        notify($exception->getMessage(), 'danger');
        redirectBack();
    }
}

function setProductsToOrder(int $orderId, array $cart): void
{
    $sql = "INSERT INTO " . Tables::OrderProducts->value . " (order_id, product_id, quantity, single_price, additions) VALUES (:order_id, :product_id, :quantity, :single_price, :additions)";
    $query = DB::connect()->prepare($sql);

    foreach ($cart as $item) {
        $additions = [];
        $data = [
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'single_price' => $item['price'],
        ];
        minusProductQty($item['product_id'], $item['quantity']);

        if (!empty($item['additions'])) {
            $additions = $item['additions'];
            foreach ($item['additions'] as $addition) {
                minusProductQty($addition['product_id'], $addition['quantity']);
            }
        }

        $data['additions'] = json_encode($additions);
        $query->execute($data);
    }
}

function minusProductQty(int $id, int $quantity): void
{
    $sql = "UPDATE " . Tables::Products->value . " SET quantity = quantity - :quantity WHERE id = :id";
    $query = DB::connect()->prepare($sql);

    if (!$query->execute(compact('id', 'quantity'))) {
        throw new Exception("Error while updating product quantity, with product id=$id and qty=$quantity");
    }
}

function updateUserBalance(int $userId, float $total): void
{
    $user = dbFind(Tables::Users, $userId);

    if ($user['balance'] < $total) {
        throw new Exception('Not enough money on your balance');
    }

    $sql = "UPDATE " . Tables::Users->value . " SET balance = balance - :total WHERE id = :id";
    $query = DB::connect()->prepare($sql);

    $query->bindParam('id', $userId, PDO::PARAM_INT);
    $query->bindParam('total', $total);

    $query->execute();
}

function insertOrder(int $userId, float $total): int
{
    $sql = "INSERT INTO " . Tables::Orders->value . " (user_id, total) VALUES (:user_id, :total)";
    $query = DB::connect()->prepare($sql);

    $query->bindParam('user_id', $userId, PDO::PARAM_INT);
    $query->bindParam('total', $total);

    $query->execute();

    return (int) DB::connect()->lastInsertId();
}
