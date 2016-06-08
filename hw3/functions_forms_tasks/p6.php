<?php

echo '6. Создать страницу, на которой можно загрузить несколько фотографий в галерею.
Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.' . "</br>"; ?>

<?php
define('IMAGES_PATH', './uploads');
$ALLOWS_IMAGES_TYPE = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/gif' => 'gif'
];

//---------------ФУНКЦИЯ, СОЗДАЮЩАЯ НОВОЕ/УНИКАЛЬНОЕ ИМЯ ФАЙЛА-----------------
function generate_image_name($image_path)
{
    global $ALLOWS_IMAGES_TYPE;

    $content_type = mime_content_type($image_path);
    if (!isset($ALLOWS_IMAGES_TYPE[$content_type])) {
        throw new Error('Not allowed file type');
    }

    return md5($image_path . time()) . '.' . $ALLOWS_IMAGES_TYPE[$content_type];
}

//---------------ФУНКЦИЯ, СОХРАНЯЮЩАЯ ФАЙЛ С НОВЫМ ИМЕНЕМ-----------------
function save_image($tmp_name, $new_image_name)
{
    return move_uploaded_file($tmp_name, IMAGES_PATH . DIRECTORY_SEPARATOR . $new_image_name);
}

//-----------------СКРИПТ-------------------------------------------------
if (isset($_POST['submit'])) {

    if (is_dir(IMAGES_PATH) === false) {
        if (mkdir(IMAGES_PATH) == false) {
            throw new Error('Error creating gallery dir');
        };
    }

    $tmp_name = $_FILES["photo"]["tmp_name"];

    if (!$tmp_name) {
        throw new Error('File was not saved');
    }

    $new_image_name = generate_image_name($tmp_name);

    if (($is_save_img = save_image($tmp_name, $new_image_name) === false)) {
        throw new Error('Error image saving');
    }
}
include "p6html.php";