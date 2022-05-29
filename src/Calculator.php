<?php

namespace SapaVadim;


class Calculator
{
    /**
     * @var float
     */
    protected $totals;

    /**
     * @var ProductInterface[]
     */
    private $products;

    /**
     * @var array
     */
    protected $storage;

    /**
     * @param array $storage
     * @return $this
     */
    public function setStorage(array $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * @param array $products
     * @return $this
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return (float)$this->totals;
    }

    /**
     * @return $this
     */
    public function execute()
    {
        $total = 0;
        foreach ($this->getProducts() as $product) {
            $code = $product["code"];
            $amount = $product["amount"];
            $product = $this->storage[$code];
            $price = $product->getPrice();
            if ($rule = $product->getRule()) {
                $pack = (int)($amount / $rule['special_amount']) * $rule['special_price'];
                $total += $pack;
                $amount = fmod($amount, $rule['special_amount']);
            }
            $subtotal = $amount * $price;
            $total += $subtotal;
        }
        $this->totals = $total;
        return $this;
    }

    /**
     * @return mixed
     */
    protected function getProducts()
    {
        return $this->products;
    }
}
