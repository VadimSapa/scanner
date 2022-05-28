<?php

namespace Scanner;

use Scanner\Storage\Stock;

class Terminal
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * @var Stock
     */
    private $stock;

    /**
     * Terminal constructor.
     */
    public function __construct()
    {
        $this->cart = new Cart();
        $this->stock = new Stock();
    }

    /**
     * @param string $products
     * @return $this
     */
    public function scan($products)
    {
        if (is_string($products)) {
            $productsArray = str_split($products, 1);
            $productCodeToAmount = array_count_values($productsArray);
            foreach ($productCodeToAmount as $code => $amount) {
                if ($product = $this->stock->getItemByCode($code)) {
                    $product->setAmount($amount);
                    $this->cart->addProduct($product);
                }
            }
            $this->calculate();
        }
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return (float)$this->cart->getSubtotal();
    }

    /**
     * @return void
     */
    protected function calculate()
    {
        if (!$products = $this->cart->getProducts()) {
            return;
        }
        $total = 0;
        foreach ($products as $product) {
            $amount = $product->getAmount();
            $price = $product->getPrice();
            if ($ruleName = $product->getRule()) {
                $rule = $this->stock->getRule($ruleName);
                $pack = (int)($amount / $rule['special_amount']) * $rule['special_price'];
                $total += $pack;
                $amount = fmod($amount, $rule['special_amount']);
            }
            $subtotal = $amount * $price;
            $total += $subtotal;
        }
        $this->cart->setSubtotal($total);
    }
}
