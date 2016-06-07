<?php

/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 17:20
 */
class Circle implements FigureInterface
{

    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function perimeter()
    {
        return 2*pi()*$this->a;
    }

    public function square()
    {
        return pi()*pow($this->a, 2);
    }
}