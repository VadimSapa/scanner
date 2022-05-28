<?php

namespace Scanner\Storage;

use Scanner\Storage\Entity\Product;

class Stock
{
    /**
     * @var array
     */
    private $stock = [
        'A' => [
            'code' => 'A',
            'price' => 2.00,
            'rule' => 'first'
        ],
        'B' => [
            'code' => 'B',
            'price' => 12.00,
            'rule' => null
        ],
        'C' => [
            'code' => 'C',
            'price' => 1.25,
            'rule' => 'second'
        ],
        'D' => [
            'code' => 'D',
            'price' => 0.15,
            'rule' => null
        ],
    ];

    /**
     * @var array
     */
    private $rules = [
        'first' => [
            'special_amount' => 4,
            'special_price' => 7.00
        ],
        'second' => [
            'special_amount' => 6,
            'special_price' => 6.00
        ]
    ];

    /**
     * @var array
     */
    private $cache = [];

    /**
     * @param string $code
     * @return Product|null
     */
    public function getItemByCode($code)
    {
        if (empty($this->cache[$code])) {
            if (array_key_exists($code, $this->stock)) {
                $this->cache[$code] = new Product($this->stock[$code]);
            } else {
                $this->cache[$code] = null;
            }
        }

        return $this->cache[$code];
    }

    /**
     * @param array $items
     * @return $this
     */
    public function addItems(array $items)
    {
        $this->stock = array_merge($this->stock, $items);
        return $this;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param string $ruleName
     * @return array|null
     */
    public function getRule($ruleName)
    {
        return isset($this->rules[$ruleName]) ? $this->rules[$ruleName] : null;
    }
}
