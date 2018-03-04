<?php

namespace Orders;

/**
 * Class OrderValidator
 * @package Orders
 */
class OrderValidator
{
    /**
     * @var
     */
    public $minimumAmount;

    /**
     * @param float $minimumAmount
     */
    public function setMinimumAmount(float $minimumAmount): void
    {
        $this->minimumAmount = $minimumAmount;
    }

    /**
     * @param float $minimumAmount
     * @return OrderValidator
     */
    public static function create(float $minimumAmount): self
    {
        $validator = new self();
        $validator->setMinimumAmount($minimumAmount);

        return $validator;
    }

    /**
     * @param $order Order
     */
    public function validate(Order $order): void
    {
        $isValid = false;

        if (
            is_string($order->getName()) &&
            strlen($order->getName()) > 2 &&
            $order->getTotalAmount() > $this->minimumAmount &&
            $order->getItems() === array_filter($order->getItems(), 'is_int')
        ) {
            $isValid = true;
        }

        $order->setIsValid($isValid);
    }
}