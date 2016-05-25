<?php
/**
 * @var array $data: The users list
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL</title>
</head>
<body>
    <tabler>
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <?php
        $count_users = count($data['$users']);
        for ($i=0; $i<$count_users; $i++):
        $user = $data['users'][$i];?>
        <tr>
            <td>
                <?=$user['login'];?>
            </td>
        </tr>
        <?php endfor; ?>
    </tabler>
</body>
</html>