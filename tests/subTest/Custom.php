<?php

class Custom
{
    private $totalMoney;

    public function __construct($money)
    {
        $this->totalMoney = $money;
    }

    public function buy(IFruit $fruit, $number)
    {
        $needMoney = $fruit->buy($number);
        if ($needMoney > $this->totalMoney) {
            return false;
        } else {
            $this->totalMoney -= $needMoney;
            return true;
        }
    }
}
