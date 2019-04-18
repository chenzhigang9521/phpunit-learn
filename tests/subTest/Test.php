<?php

require 'Apple.php';
require 'Custom.php';
use PHPUnit\Framework\TestCase;

class CustomTest extends TestCase
{
    protected $custom;

    public function setUp()
    {
        $this->custom = new Custom(50);
    }

    public function testBuy()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method("buy")
                  ->willReturn(5.6 * 10);
        $result = $this->custom->buy($appleStub, 3);
        $this->assertFalse($result);
    }

    public function testMockBuy()
    {
        $appleMock = $this->getMockBuilder(Apple::class)
                          ->setMethods(['getPrice', 'buy'])
                          ->getMock();
        //建立预期情况，buy方法会被调用一次
        $appleMock->expects($this->once())
                  ->method('buy');
        $result = $this->custom->buy($appleMock, 10);
        $this->assertFalse($result);
    }
}
