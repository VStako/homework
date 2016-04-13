<?php
/**
 * @var bool $form_was_send: form for send...
 * @var array $errors: Errors
 * @var array $comments: Comments
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Task</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php if($errors):?>
            <div class="alert alert-danger" role="alert">
                <?php for($i=0; $i < count($errors); $i++):?>
                    <?=$errors[$i];?><br>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="nick_name">Nick name: </label>
                <input type="text" class="form-control" name="nick_name" id="nick_name" required>
            </div>
            <div class="form-group">
                <label for="comment"> Password </label>
                <textarea class="form-control" id="comment" name="comment" required></textarea>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                <div>
                    <?=$form_was_send ? 'Form was send' : '';?>
                </div>
            </div>
        </form>
        <?php if($count_comments):?>
            <div>
                Count: <?=$count_comments;?>
            </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nick name</td>
                    <td>Comment</td>
                </tr>
            </thead>
            <tbody>
            <?php for($i=0; $i < $count_comments; $i++):?>
                    <tr>
                        <td><?=$comments[$i]['user_name'];?></td>
                        <td><?=$comments[$i]['comment'];?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>

</body>
</html>