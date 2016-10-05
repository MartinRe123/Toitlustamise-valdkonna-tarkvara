<?php
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{

    public function testPushandPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));  
    }

}
