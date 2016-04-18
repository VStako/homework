<?php
echo "<pre>";
$dir = scandir(".");
foreach ($dir as $filename){
    if(($filename != '.') AND($filename != '..')){
        echo "<a href=?filename=$filename>$filename</a>";
        echo "<br>";
    }
}
if(isset($_GET['filename'])){
    ?>
    <form action="" method="post">
        <textarea name="content" rows="10" cols="60">
            <?=file_get_contents($_GET['filename']);?>
        </textarea>
        <input type="hidden" name="filename" value=<?=$_GET['filename'];?>>
        <br>
        <input type="submit" name="edit">
    </form>
    <?php
    if(isset($_POST['edit'])){
        file_put_contents($_POST['filename'], $_POST['content']);
    }
}
