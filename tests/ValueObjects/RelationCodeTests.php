<?php

use bobkosse\eBoekhouden\ValueObjects\RelationCode;
use PHPUnit\Framework\TestCase;

class RelationCodeTests extends TestCase {

    use VladaHejda\AssertException;

    public function testMaximumLenghtExeeded()
    {
        $test = function() {
            $relationCode = new RelationCode("15TWL0a5HGBCfG20");
        };
        $this->assertException( $test, 'Exception', 105, 'Relation code may have a string length of maximal 15 characters' );
    }

    public function testNullInvoiceNumber()
    {
        $relationCode = new RelationCode("");
        $actual = $relationCode->__toString();

        $this->assertNull($actual);
    }

    public function testCorrectInvoiceNumber()
    {
        $relationCode = new RelationCode("123");
        $actual = $relationCode->__toString();

        $this->assertEquals("123", $actual);
    }
}