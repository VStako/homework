<DOCTYPE html>
<html>
<body>
    <form action="#" method="post">
        <textarea name="text1" cols="100" rows="5"></textarea>
        <textarea name="text2" cols="100" rows="5"></textarea>
        <input type="submit" name="button" value="Send text">
    </form>
</body>
</html>



<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 12.04.2016
 * Time: 9:24
 */
//function clear_words($word){
//    $new_word = "";
//    foreach($word as $char){
//        if ($char != "," || $char != "." || $char != "\""){
//            $new_word = $new_word.$char;
//        }
//    }
//    return $new_word;
//}

function getCommonWords($a, $b){
    $list_result = array();

    foreach(explode(" ", $a) as $word1){
        foreach(explode(" ", $b) as $word2){
//            print_r(clear_words($word1)."-".clear_words($word1)."\n");
            if ($word1 == $word2){
                array_push($list_result, $word1);
            }
        }
    }
    return $list_result;
}

$my_words = getCommonWords(htmlspecialchars($_POST['text1']), htmlspecialchars($_POST['text2']));

foreach ($my_words as $word){
    echo $word."\n";
}