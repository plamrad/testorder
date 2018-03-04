<?php
/**
 * @author Radu Plamadeala <radu@plamadeala.eu>
 */

namespace Orders;

/**
 * Class OrderPrinter
 * @package Orders
 */
class OrderPrinter
{
    const FILE_LOG = 'orderProcessLog';
    const FILE_RESULT = 'result';

    /**
     * @param string
     */
    private $orderInfo;

    /**
     * OrderPrinter constructor.
     * @param array $orderInfo
     */
    public function __construct(array $orderInfo)
    {
        $this->orderInfo = $orderInfo;
    }

    public function printToFile(): void
    {
        $this->appendToFile(self::FILE_LOG, $this->orderInfo['result']);
        $this->appendToFile(self::FILE_RESULT, $this->orderInfo['orderResult']);
    }

    /**
     * @param string $file
     * @param string $string
     */
    public function appendToFile(string $file, $string): void
    {
        if (is_string($string)) {
            file_put_contents($file, $string, FILE_APPEND);
        }
    }
}