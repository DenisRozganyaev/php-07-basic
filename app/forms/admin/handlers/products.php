<?php

function createProduct(array $fields)
{
    createProductValidation($fields);

    $fields['is_main'] = (int) $fields['is_main'];

    $sql = "INSERT INTO " . Tables::Products->value . " (name, description, price, quantity, is_main) VALUES (:name, :description, :price, :quantity, :is_main)";
    $query = DB::connect()->prepare($sql);
    $query->execute($fields);

    flushSessionByKey(SESSION_KEYS::CREATE_PRODUCT);

    redirect('/admin/products');
}

function createProductValidation(array $fields)
{
    updateSessionFields(SESSION_KEYS::CREATE_PRODUCT, $fields);

    unset($fields['description']);
    unset($fields['is_main']);

    $isEmptyFields = emptyFields($fields, SESSION_KEYS::CREATE_PRODUCT);
    $isNegativeValues = validateOnNegativeValues($fields['price'], $fields['quantity']);

    conditionRedirect($isEmptyFields || $isNegativeValues, '/admin/products/create');
}

function validateOnNegativeValues(float $price, int $quantity): bool
{
    $result = false;

    foreach (compact('price', 'quantity') as $key => $value) {
        if ($value < 0) {
            $_SESSION[SESSION_KEYS::CREATE_PRODUCT->value]['errors'][$key] = 'Values should be 0 or higher';
            $result = true;
        }
    }

    return $result;
}
