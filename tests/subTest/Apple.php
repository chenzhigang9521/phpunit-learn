<?php
require 'Ifruit.php';

class Apple implements IFruit
{
    public function getPrice()
    {
        return 5.6;
    }

    public function buy($number)
    {
        return $number * $this->getPrice();
    }
}
