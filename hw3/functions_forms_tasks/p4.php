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
function get_all_files_from_directory($directory_name){
    foreach (scandir($directory_name) as $item){
        echo $item."\n";
    }
}

get_all_files_from_directory("C:\\OpenServer\\domains\\hw3\\functions_forms_tasks");