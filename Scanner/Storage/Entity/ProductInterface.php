<?php
namespace Scanner\Storage\Entity;

interface ProductInterface
{
    const DATA_CODE = 'code';
    const DATA_PRICE = 'price';
    const DATA_RULE = 'rule';
    const DATA_AMOUNT = 'amount';

    /**
     * @param string $code
     * @return mixed
     */
    public function setCode($code);

    /**
     * @return mixed
     */
    public function getCode();

    /**
     * @param float $price
     * @return mixed
     */
    public function setPrice($price);

    /**
     * @return mixed
     */
    public function getPrice();

    /**
     * @param string $rule
     * @return mixed
     */
    public function setRule($rule);

    /**
     * @return mixed
     */
    public function getRule();
}
