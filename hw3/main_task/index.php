<?php
define('IMAGES_PATH', 'uploads');

$ALLOWS_IMAGES_TYPE = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif',
];

$form_was_send = false;
$images_limit = 7;

function generate_image_name($image_path) {
    global $ALLOWS_IMAGES_TYPE;

    $content_type = mime_content_type($image_path);
    if (!isset($ALLOWS_IMAGES_TYPE[$content_type])) {
        throw new Error(
            'Not allowed file type'
        );
    }
    return md5(
        $image_path . time()
    ) . '.' . $ALLOWS_IMAGES_TYPE[$content_type];
}

function save_image($tmp_name, $new_image_name)
{
    return move_uploaded_file(
        $tmp_name,
        IMAGES_PATH . DIRECTORY_SEPARATOR
        . $new_image_name
    );
}

function index()
{
    global $form_was_send;
    global $images_limit;

    --$images_limit;

    if ($images_limit >= 0) {

        if (is_dir(IMAGES_PATH) === false) {
            if (mkdir(IMAGES_PATH) === false) {
                throw new Error(
                    'Error creating images dir.'
                );
            }
        }

        if (isset($_POST['submit'])) {
            $form_was_send = true;

            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            $tmp_name = $_FILES["photo"]["tmp_name"];

            if (!$tmp_name) {
                throw new Exception(
                    'File was not saved'
                );
            }

            $new_image_name = generate_image_name($tmp_name);

            if ((save_image($tmp_name, $new_image_name)) === false) {
                throw new Error('Error image saving');
            }

        }
    }
}

//
//$errors = [];
//try {
    index();
//} catch (Exception $e) {
//    $errors[] = $e;
//} catch (Error $e) {
//    $errors[] = $e;
//}
include "main.php";
























//define('IMAGES_PATH', 'images');
//define('FILE_COMMENTS_NAME', 'comments.txt');
//
//$ALLOWS_IMAGES_TYPE = [
//    'image/jpeg' => 'jpg',
//    'image/png' => 'png',
//];
//
//$form_was_send = false;
//$comments = [];
//$count_comments = 0;
//
//function save_comments($comments_data) {
//    return file_put_contents(
//        FILE_COMMENTS_NAME,
//        serialize($comments_data)
//    );
//}
//
//function get_comments() {
//    return unserialize(
//        file_get_contents(
//            FILE_COMMENTS_NAME
//        )
//    );
//}
//
//function generate_image_name($image_path) {
//    global $ALLOWS_IMAGES_TYPE;
//
//    $content_type = mime_content_type($image_path);
//    if (!isset($ALLOWS_IMAGES_TYPE[$content_type])) {
//        throw new Error(
//            'Not allowed file type'
//        );
//    }
//    return md5(
//        $image_path.time()
//    ).'.'.$ALLOWS_IMAGES_TYPE[$content_type];
//}
//
///**
// * @param $tmp_name
// * @param $new_image_name
// * @throws Error: Not allowed file type
// * @return bool
// */
//function save_image($tmp_name, $new_image_name) {
//
//    return move_uploaded_file(
//        $tmp_name,
//        IMAGES_PATH.DIRECTORY_SEPARATOR
//        .$new_image_name
//    );
//}
//
//function index() {
//    global $form_was_send;
//    global $comments;
//    global $count_comments;
//
//    if (is_dir(IMAGES_PATH) === false) {
//        if (mkdir(IMAGES_PATH) === false) {
//            throw new Error(
//                'Error creating images dir.'
//            );
//        }
//    }
//
//    if (file_exists(FILE_COMMENTS_NAME)) {
//        $comments = get_comments();
//        if (!is_array($comments)){
//            throw new Error(
//                'Comments is not Array data type'
//            );
//        }
//    }
//
//    if (isset($_POST['submit'])) {
//        $form_was_send = true;
//        if (!isset($_POST['nick_name'])
//            || !isset($_POST['comment'])) {
//            throw new Exception(
//                'nick_name and comment need transfer'
//            );
//        }
//        $tmp_name = $_FILES["photo"]["tmp_name"];
//        if (!$tmp_name){
//            throw new Exception(
//                'File was not saved'
//            );
//        }
//        $new_image_name = generate_image_name(
//            $tmp_name
//        );
//        $comment_data = [
//            'user_name' => $_POST['nick_name'],
//            'comment' => $_POST['comment'],
//            'photo' => $new_image_name,
//        ];
//        $comments[] = $comment_data;
//        if (($is_save = save_comments($comments) !== false)) {
//            if (($is_save_img = save_image(
//                    $tmp_name,
//                    $new_image_name
//                )) === false) {
//                throw new Error(
//                    'Error image saving'
//                );
//            }
//        } else {
//            throw new Error(
//                'Comments was not saved!'
//            );
//        }
//    }
//    $count_comments = count($comments);
//}
//
//$errors = [];
//try {
//    index();
//} catch (Exception $e) {
//    $errors[] = $e;
//} catch (Error $e) {
//    $errors[] = $e;
//}
//
//include "main.php";