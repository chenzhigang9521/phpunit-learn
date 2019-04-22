<?php

class Observer
{
    public function update($argument)
    {
        return $argument;
        // 做点什么。
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        // 做点什么。
    }

    // 其他方法。
}
