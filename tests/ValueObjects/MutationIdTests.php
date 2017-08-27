<?php

use bobkosse\eBoekhouden\ValueObjects\MutationId;
use PHPUnit\Framework\TestCase;

class MutationIdTests extends TestCase {

    use VladaHejda\AssertException;

    public function testNotInteger()
    {
        $test = function() {
            $mutationId = new MutationId("1234");
        };
        $this->assertException( $test, 'Exception', 109, 'Mutation Id must be integer or null' );
    }

    public function testNullMutationId()
    {
        $mutationId = new MutationId();
        $actual = $mutationId->toInt();

        $this->assertNull($actual);
    }

    public function testCorrectMutationId()
    {
        $mutationId = new MutationId(123);
        $actual = $mutationId->toInt();

        $this->assertEquals(123, $actual);
    }
}