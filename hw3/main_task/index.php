<?php
//01.36.28
//02.28.28
define ('FILE_COMMENTS_NAME', 'comments.txt');
$form_was_send = false;
$comments = [];
$count_comments = 0;

function save_comments($comments_data){
    return file_put_contents(
        FILE_COMMENTS_NAME,
        serialize($comments_data)
    );
}

function get_comments(){
    return unserialize(
        file_get_contents(
            FILE_COMMENTS_NAME)
    );
}

function index(){
    global $form_was_send;
    global $comments;
    global $count_comments;

    if(file_exists(FILE_COMMENTS_NAME)){
        $comments = get_comments();
        if(!is_array($comments)){
            throw new Exception('Comments id not Array!');
        }
    }

    if (isset($_POST['submit'])){
        $form_was_send = true;

        if (!isset($_POST['nick_name']) || !isset($_POST['comment'])){
            throw new Exception('nick_name and comment need transfer');
        }

        $comment_data = [
            'user_name' => $_POST['nick_name'],
            'comment' => $_POST['comment'],
        ];

        $comments[] = $comment_data;
        if (($is_save = save_comments($comments) !== false)){
            //if no errors
        } else{
            throw new Error('comments was not saved! ');
        }
    }
    $count_comments = count($comments);
}

$errors =[];

try{
    index();
}catch(Exception $e){
    $errors[]=$e;
}
include "main.php";
