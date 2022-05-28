<?php

namespace Scanner\Storage\Entity;

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
        return $this->data[ProductInterface::DATA_RULE];
    }

    /**
     * @inheritdoc
     */
    public function getAmount()
    {
        return $this->data[ProductInterface::DATA_AMOUNT];
    }

    /**
     * @inheritdoc
     */
    public function setAmount($amount)
    {
        $this->data[ProductInterface::DATA_AMOUNT] = $amount;
        return $this;
    }
}
