<?php

/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 17:21
 */
class Triangle implements FigureInterface
{

    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function perimeter()
    {
        return $this->a + $this->b + $this->c;
    }

    public function square()
    {
        $p = $this->perimeter();
        return sqrt($p*($p-$this->a)*($p-$this->b)*($p-$this->c));
    }
}