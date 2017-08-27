<?php

use bobkosse\eBoekhouden\ValueObjects\RelationId;
use PHPUnit\Framework\TestCase;

class RelationIdTests extends TestCase {

    use VladaHejda\AssertException;

    public function testNotInteger()
    {
        $test = function() {
            $ledgerAccountId = new RelationId("1234");
        };
        $this->assertException( $test, 'Exception', 110, 'Relation Id must be integer' );
    }

    public function testNullLedgerAccountId()
    {
        $accountLedgerId = new RelationId();
        $actual = $accountLedgerId->toInt();

        $this->assertNull($actual);
    }

    public function testCorrectAccountLedgerId()
    {
        $accountLedgerId = new RelationId(123);
        $actual = $accountLedgerId->toInt();

        $this->assertEquals(123, $actual);
    }
}