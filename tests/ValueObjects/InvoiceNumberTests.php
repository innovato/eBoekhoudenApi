<?php

use bobkosse\eBoekhouden\ValueObjects\InvoiceNumber;
use PHPUnit\Framework\TestCase;

class InvoiceNumberTests extends TestCase {

    use VladaHejda\AssertException;

    public function testMaximumLenghtExeeded()
    {
        $test = function() {
            $invoiceNumber = new InvoiceNumber("15TWL0a5HGBCfG20z1RPVrkhUhDSVTUz670e7ILrYWUyLy5LgT8");
        };
        $this->assertException( $test, 'Exception', 104, 'Invoice number may have a string length of maximal 50 characters' );
    }

    public function testNullInvoiceNumber()
    {
        $invoiceNumber = new InvoiceNumber("");
        $actual = $invoiceNumber->__toString();

        $this->assertNull($actual);
    }

    public function testCorrectInvoiceNumber()
    {
        $invoiceNumber = new InvoiceNumber("123");
        $actual = $invoiceNumber->__toString();

        $this->assertEquals("123", $actual);
    }
}