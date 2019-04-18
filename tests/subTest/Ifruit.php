<?php
 
interface IFruit
{
    //获取水果的单格
    public function getPrice();
    //计算购买$number个单位的水果是需要的价格
    public function buy($number);
}
