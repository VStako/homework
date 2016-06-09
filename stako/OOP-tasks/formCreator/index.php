<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 09.06.2016
 * Time: 14:23
 * Сделайте класс, который создает формы.
 * Класс должен иметь следующие методы:
 * - создание инпута,
 * - создание textarea,
 * - создание селекта,
 * - создание чекбокса (вместе со скрытым),
 * - создание radio.
 */

$input='';

function index(){

    global $input;

    if(isset($_POS['submit'])){
        $input='<input type="'.$_POS['type'].'" name="'.$_POS['name'].'" id="'.$_POS['id'].'">';
    }
}

index();
include_once "main.php";