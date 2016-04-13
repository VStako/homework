<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 18.03.2016
 * Time: 9:14
 */
//$log = $_POST["log"];
//$pas = $_POST["pas"];
//echo $log;
//echo $pas;
//
//
//print_r($_POST);
//print_r($_SERVER);
$age = 16;
if ($age > 18) {
    echo 'i like you';
}
elseif ($age == 18) {
    echo 'i nearly like you';
}
else {
    echo 'i do not like you';
}