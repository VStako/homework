<?php

/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 17:20
 */

require_once( "FigureInterface.php" );

class Circle implements FigureInterface
{

    private $a;
    private $p;
    private $s;
    private $name = 'Circle';

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

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function perimeter()
    {
        $this->p = 2*pi()*$this->a;
    }

    public function square()
    {
        $this->s =  pi()*pow($this->a, 2);
    }
}