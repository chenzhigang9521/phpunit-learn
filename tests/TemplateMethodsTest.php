<?php
use PHPUnit\Framework\TestCase;

class TemplateMethodsTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function setUp() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function assertPreConditions() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public function testOne()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(true);
    }

    public function testTwo()
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        $this->assertTrue(true);
    }

    protected function assertPostConditions() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function tearDown() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    public static function tearDownAfterClass() : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
    }

    protected function onNotSuccessfulTest(Exception $e) : void
    {
        fwrite(STDOUT, __METHOD__ . "\n");
        throw $e;
    }
}

