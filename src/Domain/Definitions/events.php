<?php declare(strict_types=1);

return [
    'CustomerStartedShopping' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
        ],
    ],
    'ProductWasAddedToCart' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
            'sku' => 'string',
            'price' => 'string',
            'addedAt' => 'string'
        ]
    ],
    'ProductWasRemovedFromCart' => [
        'attributes' => [
            'customerId' => 'string',
            'cartId' => 'string',
            'sku' => 'string',
            'price' => 'string',
            'addedAt' => 'string'
        ]
    ],
    'CustomerPlacedOrder' => [
        'attributes' =>[
            'customerId' => 'string',
            'cartId' => 'string',
            'products' => [
                'type' => 'array_of',
                'itemType' => 'products'
            ]
        ]
    ]
];