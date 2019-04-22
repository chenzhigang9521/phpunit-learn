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

    public function testCreateMock()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method("buy")
                  ->willReturn(5.6 * 10);
        $result = $this->custom->buy($appleStub, 3);
        $this->assertFalse($result);
    }

    public function testGetMockBuilder()
    {
        $appleMock = $this->getMockBuilder(Apple::class)
                          ->setMethods(['getPrice', 'buy'])
                          ->getMock();
        //建立预期情况，buy方法会被调用一次
        $appleMock->expects($this->once())
                  ->method('buy');
        $result = $this->custom->buy($appleMock, 10);
        $this->assertTrue($result);
    }

    public function testReturnArgument()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method("buy")
                  ->willReturnArgument(0);
        $result = $this->custom->buy($appleStub, 11);
        $this->assertTrue($result);
    }

    public function testReturnSelf()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method('buy')
             ->willReturnSelf($this->returnSelf());
        $this->assertSame($appleStub, $appleStub->buy(1));
    }

    public function testReturnValueMap()
    {
        $appleStub = $this->createMock(Apple::class);
        $map = [
            [1, 3, 5, 7, 9],
            [2, 4, 7, 8]
        ];
        $appleStub->method('buy')
             ->willReturnMap($map);
        $this->assertEquals(9, $appleStub->buy(1, 3, 5, 7));
        $this->assertEquals(8, $appleStub->buy(2, 4, 7));
    }

    public function testReturnCallback()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method('buy')
             ->willReturnCallback('str_rot13');
        $this->assertEquals('fbzrguvat', $appleStub->buy('something'));
    }

    public function testOnConsecutiveCalls()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method('buy')
             ->willReturnOnConsecutiveCalls(2, 3, 5, 7);
        $this->assertEquals(2, $appleStub->buy(1));
        $this->assertEquals(3, $appleStub->buy(1));
        $this->assertEquals(5, $appleStub->buy(1));
    }

    public function testThrowException()
    {
        $appleStub = $this->createMock(Apple::class);
        $appleStub->method('buy')
            ->willThrowException(new Exception);
        $this->assertInstanceOf(Exception::class, $appleStub->buy(1));
    }
}
