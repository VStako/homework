<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 07.06.2016
 * Time: 16:27
 */
require_once( "Circle.php" );
require_once( "Square.php" );
require_once( "Triangle.php" );

define('FILE_COMMENTS_NAME', 'data.txt');

$figures = [];

function save_array($array) {
    return file_put_contents(FILE_COMMENTS_NAME, serialize($array));
}

function get_array() {
    return unserialize(file_get_contents(FILE_COMMENTS_NAME));
}

function index()
{
    global $figures;

    if (!isset($_POST['submit'])) {
//        print_r($_POST);

        if(file_get_contents(FILE_COMMENTS_NAME)){
        $figures = get_array();
//        print_r($figures);
        }

        if ($_POST['select'] == 1) {
            $circle = new Circle($_POST['side1']);
            $circle->perimeter();
            $circle->square();
            array_push($figures, $circle);
            save_array($figures);
        } elseif ($_POST['select'] == 2) {
            $square = new Square($_POST['side1']);
            $square->perimeter();
            $square->square();
            array_push($figures, $square);
            save_array($figures);
        } elseif ($_POST['select'] == 3) {
            $triangle = new Triangle($_POST['side1'], $_POST['side2'], $_POST['side3']);
            $triangle->perimeter();
            $triangle->square();
            array_push($figures, $triangle);
            save_array($figures);
        }
    }
}

index();

include_once "main.php";