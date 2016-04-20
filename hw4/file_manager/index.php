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
        echo $file;
    }
}

function render(){

}

get_files();