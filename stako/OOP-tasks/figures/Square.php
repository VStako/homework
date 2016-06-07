<?php

/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 17:20
 */
class Square implements FigureInterface
{

    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function perimeter()
    {
        return 4*$this->a;
    }

    public function square()
    {
        return pow($this->a, 2);
    }
}