<?php

function createUserParams(): array
{
    $options = [
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'surname' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'password_confirm' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ]
    ];

    return filter_input_array(INPUT_POST, $options);
}

function updateUserPasswordParams(): array
{
    $options = [
        'old_password' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'new_password' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'password_confirm' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ]
    ];

    return filter_input_array(INPUT_POST, $options);
}

function updateUserInfoParams(): array
{
    $options = [
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'surname' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'balance' => FILTER_VALIDATE_FLOAT,
    ];

    return filter_input_array(INPUT_POST, $options);
}

function authUserParams(): array
{
    $options = [
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ]
    ];

    return filter_input_array(INPUT_POST, $options);
}

function addToCartParams(): array
{
    $options = [
        'product_id' => FILTER_VALIDATE_INT,
        'quantity' => FILTER_VALIDATE_INT,
        'additions' => [
            'flags' => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_VALIDATE_INT
        ],
        'additions_qty' => [
            'flags' => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_VALIDATE_INT
        ]
    ];

    return filter_input_array(INPUT_POST, $options);
}

function removeCartItemParam(): array
{
    $options = [
        'product_key' => FILTER_VALIDATE_INT,
        'parent_key' => FILTER_VALIDATE_INT
    ];

    return filter_input_array(INPUT_POST, $options);
}

function sendMailParams(): array
{
    $options = [
        'emails' => [
            'flags' => FILTER_REQUIRE_ARRAY,
            'filter' => FILTER_VALIDATE_EMAIL
        ],
        'subject' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'body' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ]
    ];

    return filter_input_array(INPUT_POST, $options);
}
