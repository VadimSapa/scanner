<?php

namespace SapaVadim;

class Terminal
{
    /**
     * @var Scanner
     */
    private $scanner;

    /**
     * @var array
     */
    private $storage;

    /**
     * Terminal constructor.
     */
    public function __construct()
    {
        $this->scanner = new \SapaVadim\Calculator();
    }

    /**
     * @param string $inputProducts
     * @return float
     */
    public function scan(string $inputProducts)
    {
        $productsArray = str_split($inputProducts, 1);
        $productCodeToAmount = array_count_values($productsArray);
        $products = [];
        foreach ($productCodeToAmount as $code => $amount) {
            $products[] = [
                "code" => $code,
                "amount" => $amount
            ];
        }
        $this->scanner
            ->setProducts($products) // Product array what need to scan
            ->setStorage($this->storage) // Product array [] base
            ->execute();
        return $this->scanner->getTotal();
    }


    /**
     * @param array $products
     * @return $this
     * @throws VadimSapaScannerException
     */
    public function setProducts(array $products)
    {
        $productToStorage = [];
        foreach ($products as $product) {
            $newProduct = new \SapaVadim\Product($product);
            $newProduct->validate();
            $productToStorage[$product['code']] = $newProduct;
        }
        $this->storage = $productToStorage;
        return $this;
    }
}
