<?php

use bobkosse\eBoekhouden\ValueObjects\AccountLedgerCategory;
use PHPUnit\Framework\TestCase;

class AccountLedgerCategoryTests extends TestCase {

    use VladaHejda\AssertException;

    public function testMaximumLenghtExeeded()
    {
        $test = function() {
            $accountLedgerCategory = new AccountLedgerCategory("01234567890");
        };
        $this->assertException( $test, 'Exception', 108, 'Account Ledger Category may not exceed the length of 10 characters or may be null' );
    }

    public function testNullAccountLedgerCategory()
    {
        $accountLedgerCategory = new AccountLedgerCategory();
        $actual = $accountLedgerCategory->__toString();

        $this->assertNull($actual);
    }

    public function testCorrectAccountLedgerCategory()
    {
        $accountLedgerCategory = new AccountLedgerCategory("123");
        $actual = $accountLedgerCategory->__toString();

        $this->assertEquals("123", $actual);
    }
}