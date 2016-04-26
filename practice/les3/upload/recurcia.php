<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 26.04.2016
 * Time: 9:44
 */
//function recursion_print_array($arr, $deep = 0) {
//    foreach ($arr as $key => $value) {
//        if(is_array($value)) {
//            echo str_repeat("..", $deep).$key."\n";
//            recursion_print_array($value, $deep+1);
//        } else {
//            echo str_repeat("..", $deep).$value."\n";
//        }
//    }
//}

function recursion_print_array($arr) {
    static $count = 0;

    foreach ($arr as $key => $value) {
        if(is_array($value)) {
            $count++;
            echo $key . "\n";
            recursion_print_array($value);
            $count--;
            echo str_repeat(' ', $count) . "\n";
        } else {
            if (is_integer($key)) {
                echo str_repeat(' ', $count) . $value . "\n";
            } else {
                echo str_repeat(' ', $count) . $key . "\n";
                echo str_repeat('  ', $count) . $value . "\n";
            }
        }
    }
}

$cats = [
    "Electronics" => [
        "Phones" => ["Mobile Phones", "Satellite Phones"],
        "Tablets",
        "Lop-tops"
    ],
    "Special Deals"
];

recursion_print_array($cats);