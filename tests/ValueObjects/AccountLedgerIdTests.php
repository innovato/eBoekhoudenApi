<?php

use bobkosse\eBoekhouden\ValueObjects\AccountLedgerId;
use PHPUnit\Framework\TestCase;

class AccountLedgerIdTests extends TestCase {

    use VladaHejda\AssertException;

    public function testNotInteger()
    {
        $test = function() {
            $ledgerAccountId = new AccountLedgerId("1234");
        };
        $this->assertException( $test, 'Exception', 106, 'Account Ledger Id must be integer or null' );
    }

    public function testNullLedgerAccountId()
    {
        $accountLedgerId = new AccountLedgerId();
        $actual = $accountLedgerId->toInt();

        $this->assertNull($actual);
    }

    public function testCorrectAccountLedgerId()
    {
        $accountLedgerId = new AccountLedgerId(123);
        $actual = $accountLedgerId->toInt();

        $this->assertEquals(123, $actual);
    }
}