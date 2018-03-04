<?php

namespace Orders;

/**
 * Class Order
 * @package Orders
 */
class Order
{
    /**
     * @var int
     */
    private $orderId;

    /**
     * @var bool
     */
    private $isManual = false;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $items;

    /**
     * @var float
     */
    private $totalAmount;

    /**
     * @var string
     */
    private $deliveryDetails;

    /**
     * @param bool
     */
    private $isValid = false;

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param bool $isManual
     */
    public function setIsManual(bool $isManual): void
    {
        $this->isManual = $isManual;
    }

    /**
     * @return bool
     */
    public function getIsManual(): bool
    {
        return $this->isManual;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param float $totalAmount
     */
    public function setTotalAmount(float $totalAmount): float
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    /**
     * @param $deliveryDetails
     */
    public function setDeliveryDetails($deliveryDetails): string
    {
        $this->deliveryDetails = $deliveryDetails;
    }

    /**
     * @return string
     */
    public function getDeliveryDetails(): string
    {
        return $this->deliveryDetails;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid(bool $isValid): bool
    {
        $this->isValid = $isValid;
    }

    /**
     * @return bool
     */
    public function getIsValid(): bool
    {
        return $this->isValid;
    }
}