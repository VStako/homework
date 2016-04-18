<html>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="310000">
        <input multiple="multiple" type="file" name="filename[]">
        <br>
        <input type="submit" name="submit" value="send">
    </form>
    <pre>
        <?php
        //01.25.00 max2
        error_reporting(E_ALL);
        if(isset($_POST['submit'])) {
//            print_r($_POST);
//            print_r($_FILES);
            foreach ($_FILES['filename']['tmp_name'] as $k => $v) {
                if (getimagesize($v)) {
                    move_uploaded_file($v, "upload/" . $_FILES['filename']['name'][$k]);
                }
            }
        }

        $dir = scandir("upload/");
        foreach ($dir as $v){
            if(($v != '.') AND ($v != '..')) {
                echo "<img style='height:300px;float:left;' src=http://homework/practice/les3/upload/$v>";
            }
        }

        ?>
</html>
