<?php
/**
 * @var array|null $opened_file: File
 */
?>
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
                            <a href="<?='?go_to='.$file_info['file_path'];?>">
                                <?=$file; ?>
                            </a>
                            <?php else: ?>
                            <a href="<?='?open='.$file_info['file_path'];?>">
                                <?=$file; ?>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td><?= $file_info['is_dir'] ?  'Dir' : 'File'; ?></td>
                    <td><?= $file_info['file_size']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if ($opened_file !== null) : ?>
        <h3><?= $opened_file['file_name']?></h3>
    <div>
        <?= $opened_file['content'];?>
    </div>
    <?php endif?>
</div>
</body>
</html>
