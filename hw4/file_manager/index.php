<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 20.04.2016
 * Time: 15:52
 */
function get_files() {
    $dh = opendir(__DIR__);
    while(($file = readdir($dh)) !== false){
        $file_path = __DIR__.DIRECTORY_SEPARATOR.$file;
        yield [
            'is_dir' => is_dir($file_path),
            'file_size' => 1 or filesize($file_path),
        ] => $file;
    }
}

function render(){
    if ($_GET) {
        //$go_to = isset($_GET['go_to'] & $_GET['go_to'] : null;
        $go_to = $_GET['go_to']?? null;
        if ($go_to !== null){
            if(is_dir($go_to)){
                chdir($go_to);
            } else {
                throw new Exception();
            }
        }
    }

    include "main.php";
}

render();