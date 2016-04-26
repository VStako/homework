<?php
session_start();

function registration_user(){
    return null;
}

function get_user(){
    return null;
}

function render()
{
    $errors = [];
    try {
        $current_user = get_user();
        if ($current_user === null) {
            if (isset($_POST['submit'])) {
                if (registration_user()) {
                    throw new Exception('User didnt register');
                }
            }
        }
    } catch (Exception $e){
        $errors[] = $e;
    }

    include "main.php";
}

render();

//02.42.23