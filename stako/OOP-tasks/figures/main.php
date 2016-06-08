<?php
/**
 * @var array $figures: array with figures
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Figures</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="select">Chose the figure: </label>
        <select name="select" id="select" required>
            <option value="1">Circle</option>
            <option value="2">Square</option>
            <option value="3">Triangle</option>
        </select> <br>
        <label for="side1">Side1</label>
        <input type="text" name="side1" id="side1" required>    <br>
        <label for="side2">Side2</label>
        <input type="text" name="side2" id="side2">             <br>
        <label for="side3">Side3</label>
        <input type="text" name="side3" id="side3">             <br>
        <button type="submit" value="Отправить">КНОПКА</button>
    </form>
<!--    <pre>-->
<!--        --><?php //print_r($figures); ?>
<!--    </pre>-->
    <table border="1ps solid black">
        <tr>
            <th width="25%"> Figure </th>
            <th width="25%"> P </th>
            <th width="25%"> S </th>
        </tr>
        <?php foreach ($figures as $figure) :?>
        <tr>
            <td><?= $figure->getName(); ?></td>
            <td><?= $figure->getP(); ?></td>
            <td><?= $figure->getS(); ?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>