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
    $opened_file = null;
    if ($_GET) {
        $go_to = isset($_GET['go_to']) ? $_GET['go_to'] : null;
        $open = isset($_GET['open']) ? $_GET['open'] : null;
//        $go_to = $_GET['go_to']?? null;
        if ($go_to !== null){
            echo $go_to;
            if(is_dir($go_to)){
                chdir($go_to);
            } else {
                throw new Exception('Is not directory');
            }
        } elseif ($open !== null) {
            if (file_exists($open)){
                $opened_file = [];
                $opened_file['file_name'] = basename($open);
                $opened_file['content'] = htmlspecialchars(file_get_contents($open));
            } else {
                throw new Exception('File not exist');
            }
        }
    }

    include "main.php";
}

render();