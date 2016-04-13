<DOCTYPE html>
    <html>
    <body>
    <form action="#" method="post">
        <textarea name="text" cols="100" rows="5"></textarea>
        <input type="submit" name="button" value="Send text">
    </form>
    </body>
    </html>



<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 12.04.2016
 * Time: 10:47
 */

function top_the_longest_word($string){
    $list_of_words = explode(" ", $string);

    for($i = 0; $i < count($list_of_words)-1; $i++){
        $j = 0;
        while ($j < count($list_of_words)-1)  {
            if (strlen($list_of_words[$j]) < strlen($list_of_words[$j+1])) {
                $temp=$list_of_words[$j];
                $list_of_words[$j]=$list_of_words[$j+1];
                $list_of_words[$j+1]=$temp;
            }
            ++$j;
        }
    }
    if (count($list_of_words) >= 3) {
        echo $list_of_words[0]." - ".strlen($list_of_words[0])."\n";
        echo $list_of_words[1]." - ".strlen($list_of_words[1])."\n";
        echo $list_of_words[2]." - ".strlen($list_of_words[2])."\n";
    } else echo "This array doesn't have 3 items!";
}

top_the_longest_word(htmlspecialchars($_POST['text']));