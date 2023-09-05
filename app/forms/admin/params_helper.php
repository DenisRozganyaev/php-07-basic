<?php

function createProductParams(): array
{
    $options = [
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'description' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'quantity' => FILTER_VALIDATE_INT,
        'price' => FILTER_VALIDATE_FLOAT,
        'is_main' => FILTER_VALIDATE_BOOLEAN
    ];

    return filter_input_array(INPUT_POST, $options);
}
