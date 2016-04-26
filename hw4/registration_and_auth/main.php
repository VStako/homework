<?php
/**
 * @var array $errors
 * @var $current_user
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
    <?php if ($errors): ?>
        <div class="alert alert-danger" role="alert">
            <?php for ($i = 0; $i < count($errors); $i++): ?>
                <?= $errors[$i]; ?><br>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
    <?php if ($current_user === null) : ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" id="login" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="password2">Repeat your password</label>
                <input type="password" class="form-control" name="password2" id="password2" required>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
