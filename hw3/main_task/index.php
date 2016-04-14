<?php
define ('FILE_COMMENTS_NAME', 'comments.txt');
define ('IMAGES_PATH', 'images');

$ALLOWS_IMAGES_TYPE = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png'
];
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
    global $ALLOWS_IMAGES_TYPE;

    if(is_dir(IMAGES_PATH) == false){
        if(mkdir(IMAGES_PATH) === false){
            throw new Exception('Error creating images dir.');
        }
    }


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
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $name = $_FILES["photo"]["name"];
            $content_type = mime_content_type($tmp_name);
            var_dump($content_type);
            $allow_type = $ALLOWS_IMAGES_TYPE[$content_type];
            var_dump($allow_type);

            if (!isset($allow_type)){
                throw new Exception(
                    'Not allowed file type'
                );
            }
            move_uploaded_file($tmp_name, IMAGES_PATH.DIRECTORY_SEPARATOR.md5($name.time()).'.'.$allow_type);
        } else{
            throw new Error('comments was not saved! ');
        }
    }
    $count_comments = count($comments);
}

$errors = [];

try{
    index();
}catch(Exception $e){
    $errors[]=$e;
}
include "main.php";
