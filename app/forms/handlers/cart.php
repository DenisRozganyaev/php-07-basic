<?php

function addToCart(array $productData)
{
    $cartItems = retrieveCartFromCookie();
    $cartItems = addOrCombineProduct(
        $cartItems,
        $productData
    );

    $expire = time() + (60 * 60 * 24 * 10);
    setcookie('cart', json_encode($cartItems), $expire);
    notify("Product was added to the cart");
    redirect();
}

function addOrCombineProduct(array $cartItems, array $addedProduct): array
{
    $sameProduct = array_filter(
        $cartItems,
        fn($item) => $item['product_id'] === $addedProduct['product_id'] && empty($item['additions'])
    );

    if (!empty($addedProduct['additions']) || empty($sameProduct)) {
        $cartItems[] = $addedProduct;
    } else {
        array_walk(
            $cartItems,
            function (&$item, $key, $recentProduct) {
                if ($item['product_id'] === $recentProduct['product_id'] && empty($item['additions'])) {
                    $item['quantity'] += $recentProduct['quantity'];
                }
            },
            $addedProduct
        );
    }

    return $cartItems;
}

function retrieveCartFromCookie(): array
{
    return isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
}

function getCartItems(): array
{
    $cart = retrieveCartFromCookie();
    $cartItems = [];
    if (!empty($cart)) {
        $ids = mapCartIds($cart);
        $products = dbSelect(Tables::Products, condition: 'id IN (' . implode(',', $ids) . ')');
        $cartItems = prepareCartItems($cart, $products);
        $cartItems['total'] = calcTotal($cartItems);
    }

    return $cartItems;
}

function calcTotal(array $cart): float
{
    $total = 0;

    foreach ($cart as $cartItem) {
        if (!empty($cartItem['additions']) && is_array($cartItem['additions'])) {
            $cartItem['total'] += calcTotal($cartItem['additions']);
        }
        $total += $cartItem['total'];
    }

    return $total;
}

function prepareCartItems(array $cart, array $dbProducts): array
{
    return array_map(
        function ($item) use ($dbProducts) {
            $product = getProductDataFromDbArray($dbProducts, $item['product_id']);
            $item = array_merge(
              $item,
              [
                  'name' => $product['name'],
                  'price' => $product['price'],
                  'total' => $product['price'] * $item['quantity'],
              ]
            );

            if (!empty($item['additions'])) {
                $item['additions'] = buildAdditionsData(
                  $item['additions'],
                  $item['additions_qty'],
                  $dbProducts,
                  $item['product_id']
                );
            } else {
                unset($item['additions']);
            }
            unset($item['additions_qty']);

            return $item;
        },
        $cart);
}

function buildAdditionsData(array $additions, array $additionsQty, array $dbProducts, int $parentId): array
{
    return array_map(
        function($id, $quantity) use($dbProducts, $parentId) {
            $product = getProductDataFromDbArray($dbProducts, $id);
            return [
                'product_id' => $id,
                'parent_id' => $parentId,
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'total' => $quantity * $product['price']
            ];
        },
        $additions,
        $additionsQty
    );
}

function getProductDataFromDbArray(array $dbProducts, int $id): array|null
{
    $result = array_filter($dbProducts, fn($dbItem) => $dbItem['id'] === $id);
    return array_shift($result);
}

function mapCartIds(array $cart): array
{
    $result = [];

    array_walk(
        $cart,
        function ($item) use (&$result) {
            $ids = is_null($item['additions']) ? [$item['product_id']] : [$item['product_id'], ...$item['additions']];
            array_push($result, ...$ids);
        }
    );

    return array_unique($result);
}
