<?php
define ('FILE_COMMENTS_NAME', 'comments.txt');
$form_was_send = false;

function save_comments($comment_data){
    return file_put_contents(
        FILE_COMMENTS_NAME,
        serialize($comment_data)
    );
}

if (isset($_POST['submit'])){
    $form_was_send = true;


    if (!isset($_POST['nick_name']) || !isset($_POST['comment'])){
        throw new Error('nick_name and comment need transfer');
    }

    $comment_data = [
        'user_name' => $_POST['nick_name'],
        'comment' => $_POST['comment'],
    ];

    if (($is_save = save_comments($comment_data) !== false)){

    }
}

include "main.php";

//        $r = unserialize(file_get_contents(FILE_COMMENTS_NAME));
//
//        echo '<pre>';
//        print_r($r);
//        echo '<pre>';


//    echo '<pre>';
//    print_r($_POST);
//    echo '<pre>';


//    echo '<pre>';
//    print_r(serialize($_POST));
//    echo '<pre>';
