<?php

namespace bobkosse\eBoekhouden\ValueObjects;

/**
 * Class Date
 * @package bobkosse\eBoekhouden\ValueObjects
 */
class InvoiceNumber {

    /**
     * @var
     */
    private $invoiceNumber;

    /**
     * InvoiceNumber constructor.
     * @param $invoiceNumber
     * @throws \Exception
     */
    public function __construct($invoiceNumber)
    {
        if(strlen($invoiceNumber) < 51 || $invoiceNumber === null) {
            $this->invoiceNumber = $invoiceNumber;
            return;
        }
        throw new \Exception("Invoicenumber may have a string length of maximal 50 characters", 104);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        if($this->invoiceNumber == '') {
            return null;
        }
        return $this->invoiceNumber;
    }
}