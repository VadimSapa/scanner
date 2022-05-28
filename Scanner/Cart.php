<?php

namespace Scanner;

use Scanner\Storage\Entity\ProductInterface;

class Cart
{
    /**
     * @var ProductInterface[]
     */
    private $products;

    /**
     * @var float
     */
    private $subtotal;

    /**
     * @param ProductInterface $product
     * @return $this
     */
    public function addProduct(ProductInterface $product)
    {
        $this->products[] = $product;
        return $this;
    }

    /**
     * @return ProductInterface[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param float $subtotal
     * @return $this
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
}
