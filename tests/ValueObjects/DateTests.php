<?php

use bobkosse\eBoekhouden\ValueObjects\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase {

    use VladaHejda\AssertException;

    public function testDateBefore1980Fault()
    {
        $test = function() {
            $date = new Date("1979-12-31");
        };
        $this->assertException( $test, 'Exception', 102, 'Year must be greater or equal to 1980' );
    }

    public function testDateAfter2049Fault()
    {
        $test = function() {
            $date = new Date("2050-01-01");
        };
        $this->assertException( $test, 'Exception', 103, 'Year must be less or equal to 2049' );
    }

    public function testInvalidDateFormat()
    {
        $test = function() {
            $date = new Date("01-01-2017");
        };
        $this->assertException( $test, 'Exception', 101, 'DateFormat incorrect for value: 01-01-2017' );
    }

    public function testNonExistingDate()
    {
        $test = function() {
            $date = new Date("2017-02-30");
        };
        $this->assertException( $test, 'Exception', 101, 'DateFormat incorrect for value: 2017-02-30' );
    }
}