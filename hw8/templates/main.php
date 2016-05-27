<?php
/**
 * @var array $data: [
 *  $USER_TYPES,
 *  $users,
 *  $current_type
 * ]
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?=$data['render_template']('filter', [
    'USER_TYPES' => $data['USER_TYPES'],
    'current_type' => $data['current_type'],
]);?>
<table>
    <thead>
    <tr>
        <th>USER_CID</th>
        <th>VAL</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count_users = count($data['users']);
    for ($i = 0; $i < $count_users; $i++):
        $user = $data['users'][$i];
        ?>
        <tr>
            <td>
                <?=$user['user_cid'];?>
            </td>
        </tr>
    <?php endfor;?>
    </tbody>
</table>
</body>
</html>


<!--try {-->
<!--//Если ошибка подключения к БД...-->
<!--throw new DbConnectionError();-->
<!--} catch (DbConnectionError $ex) {-->
<!--echo '!!!';-->
<!--}-->