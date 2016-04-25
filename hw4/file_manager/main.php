<?php
/**
 * Created by PhpStorm.
 * User: stako
 * Date: 25.04.2016
 * Time: 16:27
 */?>
<DOCTYPE! html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <table class="table table-bordered">
        <tbody>
            <?php foreach (get_files() as $file_info => $file):?>
                <tr>
                    <td>
                        <?php if ($file_info['is_dir']): ?>
                            <a href="<?='?go_to='.$file;?>">
                                <?=$file; ?>
                            </a>
<!--                            --><?php //else: ?>
                            <?=$file; ?>
                        <?php endif;                        ?>
                    </td>
                    <td><?= $file_info['is_dir'] ?  'Dir' : 'File'; ?></td>
                    <td><?= $file_info['file_size']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
