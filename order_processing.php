<?php

use Orders\Order;
use Orders\OrderPrinter;
use Orders\OrderProcessor;
use Orders\OrderValidator;

require_once 'vendor/autoload.php';

$order = new Order();
$order->setOrderId(2);
$order->setName('John');
$order->setItems([6654]);
$order->setTotalAmount(346.2);

$minimumAmount = file_get_contents('input/minimumAmount');

$orderProcessor = new OrderProcessor(OrderValidator::create($minimumAmount));
$printOutput = $orderProcessor->process($order);

$orderPrinter = new OrderPrinter($printOutput);
$orderPrinter->printToFile();