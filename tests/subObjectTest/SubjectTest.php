<?php

require 'Subject.php';
use PHPUnit\Framework\TestCase;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated()
    {
        // 为 Observer 类建立仿件对象，只模仿 update() 方法。
        $observer = $this->getMockBuilder(Observer::class)
                         ->setMethods(['update'])
                         ->getMock();

        // 建立预期状况：update() 方法将会被调用一次，
        // 并且将以字符串 'something' 为参数。
        $observer->expects($this->once())
                 ->method('update')
                 ->with($this->equalTo('something'));

        // 创建 Subject 对象，并将模仿的 Observer 对象连接其上。
        $subject = new Subject('My subject');
        $subject->attach($observer);

        // 在 $subject 对象上调用 doSomething() 方法，
        // 预期将以字符串 'something' 为参数调用
        // Observer 仿件对象的 update() 方法。
        var_dump($subject->doSomething());die;
        $subject->doSomething();
    }
}
