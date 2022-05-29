<?php

namespace SapaVadim;

class Product implements ProductInterface
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * Product constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function setCode($code)
    {
        $this->data[ProductInterface::DATA_CODE] = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCode()
    {
        return $this->data[ProductInterface::DATA_CODE];
    }

    /**
     * @inheritdoc
     */
    public function setPrice($price)
    {
        $this->data[ProductInterface::DATA_PRICE] = $price;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPrice()
    {
        return $this->data[ProductInterface::DATA_PRICE];
    }

    /**
     * @inheritdoc
     */
    public function setRule($rule)
    {
        $this->data[ProductInterface::DATA_RULE] = $rule;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRule()
    {
        return $this->data[ProductInterface::DATA_RULE] ?? null;
    }

    /**
     * @return bool
     * @throws VadimSapaScannerException
     */
    public function validate()
    {
        if (!$this->getCode()) {
            throw new VadimSapaScannerException("Code is required for product");
        }

        if (!$this->getPrice()) {
            throw new VadimSapaScannerException("Price is required for product");
        }

        if ($this->getRule() && !is_array($this->getRule())) {
            throw new VadimSapaScannerException("Rule must be array");
        }
        return true;
    }
}
