<?php
define ('FILE_COMMENTS_NAME', 'comments.txt');
$form_was_send = false;

function save_comments($comment_data){
    return file_put_contents(
        FILE_COMMENTS_NAME,
        serialize($comment_data)
    );
}

function get_comments(){
    return unserialize(file_get_contents(
        FILE_COMMENTS_NAME)
    );
}

function index(){
    if (isset($_POST['submit'])){
        $form_was_send = true;


        if (!isset($_POST['nick_name']) || !isset($_POST['comment'])){
            throw new Exception('nick_name and comment need transfer');
        }

        $comment_data = [
            'user_name' => $_POST['nick_name'],
            'comment' => $_POST['comment'],
        ];

        if(file_exists(FILE_COMMENTS_NAME)){
            $commnts = get_comments();
            if(!is_array($commnts)){
                throw new Exception('Comments id not Array!');
            }
        }


        //01.35.39

        $comments[] = $comment_data;
        if (($is_save = save_comments($comments) !== false)){
            //if no errors
        } else{
            throw new Error('comments was not saved! ');
        }
    }


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

}

$errors =[];

try{
    index();
}catch(Exception $e){
    $errors[]=$e;
}
include "main.php";
