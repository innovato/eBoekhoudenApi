<?php

use bobkosse\eBoekhouden\ValueObjects\AccountLedgerCode;
use PHPUnit\Framework\TestCase;

class AccountLedgerCodeTest extends TestCase {

    use VladaHejda\AssertException;

    public function testMaximumLenghtExeeded()
    {
        $test = function() {
            $accountLedgerCode = new AccountLedgerCode("01234567890");
        };
        $this->assertException( $test, 'Exception', 107, 'Account Ledger Code may not exceed the length of 10 characters or may be null' );
    }

    public function testNullAccountLedgerCode()
    {
        $accountLedgerCode = new AccountLedgerCode();
        $actual = $accountLedgerCode->__toString();

        $this->assertNull($actual);
    }

    public function testCorrectAccountLedgerCode()
    {
        $accountLedgerCode = new AccountLedgerCode("123");
        $actual = $accountLedgerCode->__toString();

        $this->assertEquals("123", $actual);
    }
}