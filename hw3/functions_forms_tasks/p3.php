<DOCTYPE! html>
<html>
<body>
    <form action="#" method="post">
        <input type="text" name="number">
        <input type="submit" name="button" value="Send text">
    </form>
</body>
</html>
<?php
function delete_words_length_like($number, $text){
    $new_text = array();
    foreach(preg_split('/[\s,\n]+/', $text) as $word){
        if(mb_strlen($word, 'utf-8') <= $number){
            array_push($new_text, $word);
        }
    }
    return $new_text;
}

function me_ptint_array($array){
    foreach($array as $item){
        echo $item." - ".mb_strlen($item, 'utf-8')."\n";
    }
}

$file = file_get_contents('../text.txt', true);
$number = htmlspecialchars($_POST['number']);
$text_array = delete_words_length_like($number, $file);
me_ptint_array($text_array);
