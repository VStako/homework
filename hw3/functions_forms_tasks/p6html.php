<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 6</title>
</head>
<body>
<div class="container">
    <form action="p6.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="photo">Upload your photo: </label>
            <input type="file" id="photo" name="photo">
        </div>
        <div>
            <button type="submit" class="btn btn-default" name="submit">Submit</button>
        </div>
    </form>

    <?php if ($dir = scandir(IMAGES_PATH)):
        foreach ($dir as $key => $value) {
            if ($value == '.' or $value == '..') {
                unset($dir[$key]);
            }
        } ?>
        <table class="table table-hover">
            <?php $dir = array_values($dir);
            for ($i = 0; $i < count($dir); $i++):
                $v = $dir[$i];?>
                <?php if ($v != '.' && $v != '..'):?>
                <?php if ($i % 5 == 0):?>
                    <tr></tr>
                    <td>
                        <img style="height: 150px;"
                             src="<?= IMAGES_PATH . DIRECTORY_SEPARATOR . ($v ? $v : ''); ?>">
                    </td>
                <?php else: ?>
                    <td>
                        <img style="height: 150px;"
                             src="<?= IMAGES_PATH . DIRECTORY_SEPARATOR . ($v ? $v : ''); ?>">
                    </td>
                <?php endif; ?>
            <?php endif; ?>
            <?php endfor; ?>
        </table>
    <?php endif; ?>

</div>
</body>
</html>


