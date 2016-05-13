<?php
session_start();

function validation_registration_user($form_fields){
    if (
        !isset($form_fields['login']) or
        !isset($form_fields['password']) or
        !isset($form_fields['password2']) or
        empty($form_fields['login']) or
        empty($form_fields['password']) or
        ($form_fields['password'] != $form_fields['password2'])
        )
    {
        return false;
    }
    return true;
}

define('USER_DATA_FILE', 'users.data');
function registration_user($user){
    $users = null;
    if (!file_exists(USER_DATA_FILE)){
        file_put_contents(USER_DATA_FILE, serialize([$user]));
    } else {
        $data = file_get_contents(USER_DATA_FILE);
        if ($data === false) {
            throw new Exception();
        }
        $users = unserialize($data);
        if ($users === false){
            throw new Exception();
        }
        $users[] = $user;
        file_put_contents(USER_DATA_FILE, serialize($users));
    }
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
                if (validation_registration_user($_POST) === false) {
                    throw new Exception('Fields error!');
                }
                $user = [
                    'login' => $_POST['login'],
                    'password' => $_POST['password'],
                    'password2' => $_POST['password2'],
                ];
                if (registration_user($user) == false){
                    throw new Exception();
                }
            }
        }
    } catch (Exception $e){
        $errors[] = $e;
    }

    include "main.php";
}

render();

//03.08.00