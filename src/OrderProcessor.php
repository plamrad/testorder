<?php

namespace Orders;

/**
 * Class OrderProcessor
 * @package Orders
 */
class OrderProcessor
{
    /**
     * @var OrderValidator
     */
    private $validator;

    /**
     * OrderProcessor constructor.
     * @param OrderValidator $validator
     */
    public function __construct(OrderValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Order $order
     * @return array
     */
    public function process(Order $order): array
    {
        $this->validator->validate($order);

        if (true === $order->getIsValid()) {
            $this->addDeliveryCostLargeItem($order);
            $this->setDeliveryDetails($order);
        }

        return $this->getPrintOutput($order);
    }

    /**
     * @param Order $order
     */
    public function addDeliveryCostLargeItem(Order $order): void
    {
        foreach ($order->getItems() as $item) {
            if (in_array($item, OrderItem::LARGE_ITEMS)) {
                $order->setTotalAmount($order->getTotalAmount() + 100);
            }
        }
    }

    /**
     * @param Order $order
     */
    public function setDeliveryDetails(Order $order): void
    {
        $itemCount = count($order->getItems());

        $durationDetails = 'Order delivery time: ';
        $durationDetails .= $itemCount == 1 ?: 2;
        $durationDetails .= ' day';
        $durationDetails .= $itemCount > 1 ? 's' : '';

        $order->setDeliveryDetails($durationDetails);
    }

    /**
     * @param Order $order
     * @return array
     */
    public function getPrintOutput(Order $order): array
    {
        $orderResult = '';
        $result = 'Processing started, OrderId: ' . $order->getOrderId() . PHP_EOL;

        if (true !== $order->getIsValid()) {
            $result .= 'Order is invalid' . PHP_EOL;
        } else {
            $result .= 'Order "' . $order->getOrderId() . '"';

            if (true === $order->getIsManual()) {
                $result .= ' NEEDS MANUAL PROCESSING';
            } else {
                $result .= ' WILL BE PROCESSED AUTOMATICALLY';
            }

            $result .= PHP_EOL;

            $orderResult =
                $order->getOrderId() .
                '-' . implode(',', $order->getItems()) .
                '-' . $order->getDeliveryDetails() .
                '-' . (int)$order->getIsManual() .
                '-' . $order->getTotalAmount() .
                '-' . $order->getName() .
                PHP_EOL;
        }

        return [
            'result' => $result,
            'orderResult' => $orderResult
        ];
    }
}