<?php
function get_files() {
    $cd = getcwd();
    $dh = opendir($cd);
    while(($file = readdir($dh)) !== false){
        $file_path = $cd.DIRECTORY_SEPARATOR.$file;
        yield [
            'is_dir' => is_dir($file_path),
            'file_size' => filesize($file_path),
            'file_path' => $file_path,
        ] => $file;
    }
}

function render(){
    if ($_GET) {
        $go_to = isset($_GET['go_to']) ? $_GET['go_to'] : null;
//        $go_to = $_GET['go_to']?? null;
        if ($go_to !== null){
            echo $go_to;
            if(is_dir($go_to)){
                chdir($go_to);
            } else {
                throw new Exception('Is not directory');
            }
        }
    }

    include "main.php";
}

render();