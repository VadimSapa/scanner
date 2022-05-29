<?php

/**
 * Product listing
 *
 * Description:
 * All arrays should have key like product.code
 * "code" - required field, should have one later. "A" and "a" is a different codes
 * 'price' - required field, should have Float type
 * 'rule' - optional field, should store one rule name
 *
 * 'special_amount' - required field, quantity to which the special price applies
 * 'special_price' - required field, special price that applies to all special amount
 *
 * @var array
 */
$stock = [
    'A' => [
        'code' => 'A',
        'price' => 2.00,
        'rule' => [
            'special_amount' => 4,
            'special_price' => 7.00
        ]
    ],
    'B' => [
        'code' => 'B',
        'price' => 12.00
    ],
    'C' => [
        'code' => 'C',
        'price' => 1.25,
        'rule' => [
            'special_amount' => 6,
            'special_price' => 6.00
        ]
    ],
    'D' => [
        'code' => 'D',
        'price' => 0.15
    ]
];
