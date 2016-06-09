<?php

/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 17:21
 */
require_once( "FigureInterface.php" );

class Triangle implements FigureInterface
{
    private $a;
    private $b;
    private $c;
    private $p;
    private $s;
    private $name = 'Triangle';

    public function getP()
    {
        return $this->p;
    }

    public function getS()
    {
        return $this->s;
    }
    public function getName()
    {
        return $this->name;;
    }

    public function setP($p)
    {
        $this->p = $p;
    }

    public function setS($s)
    {
        $this->s = $s;
    }

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function perimeter()
    {
        $this->p = $this->a + $this->b + $this->c;
    }

    public function square()
    {
        $this->s = sqrt($this->p/2*($this->p/2-$this->a)*($this->p/2-$this->b)*($this->p/2-$this->c));
    }
}