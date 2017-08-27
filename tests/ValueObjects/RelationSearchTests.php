<?php

use bobkosse\eBoekhouden\ValueObjects\RelationSearch;
use PHPUnit\Framework\TestCase;

class RelationSearchTests extends TestCase {

    use VladaHejda\AssertException;

    public function testMaximumLenghtExeeded()
    {
        $test = function() {
            $relationSearch = new RelationSearch("3DzgdhTOxHFKJEaQDzTEX8VwfhACBawjVbvNRG9WcYgnDqjzmHp0VdLxdRRmFtusMCBBuxlGjypFdQOxKtiwXm1JCP5kQdTmSHQancEEpPvvTvbmJovDb8XG6zdPJsBchlAAwwMA6XHZRQUhzEFbyGISngK3yQqVVsTBTZCSTRYSrDHPxXqVuHWzTFKjJ7dMXkbJQIJIbvbxoLaiPT3PRDG1IlCzNBI2OTrveZKh02uVtuK4hWeKaYtjYwMVVydV");
        };
        $this->assertException( $test, 'Exception', 111, 'Relation search query may not exceed the length of 255 characters' );
    }

    public function testEmptyRelationSearch()
    {
        $test = function() {
            $relationSearch = new RelationSearch("");
        };
        $this->assertException( $test, 'Exception', 111, 'Relation search query may not exceed the length of 255 characters' );
    }

    public function testCorrectRelationSearch()
    {
        $relationSearch = new RelationSearch("Amsterdam");
        $actual = $relationSearch->__toString();

        $this->assertEquals("Amsterdam", $actual);
    }
}