<?php
function search_the_word_in_file($directory_name, $search_word){
    $list_of_files = glob("*.txt");;
//    $list_of_files = scandir($directory_name);
    print_r($list_of_files);
    $files = array();
    foreach($list_of_files as $file){
        echo $file."\n";
        foreach(preg_split('/[\s,.!?\n]+/', $file) as $word){
            if ($word == $search_word){
                array_push($files, $file);
            }
        }
    }
    print_r($files);
}


search_the_word_in_file("C:\\OpenServer\\domains\\hw3", "CSS");
