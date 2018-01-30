<?php declare(strict_types=1);

return [
    'StartShopping' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
            'startTime' => 'string',
        ],
    ],
    'AddProductToCart' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
            'sku' => 'string',
            'price' => 'string',
            'addedAt' => 'string'
        ]
    ],
    'RemovePorductFromCart' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
            'sku' => 'string',
            'price' => 'string',
            'removedAt' => 'string'
        ]
    ],
    'PlaceOrder' => [
        'attributes' =>[
            'customerId' => 'string',
            'cartId' => 'string',
            'orderTime' => 'string',
        ]
    ]
];