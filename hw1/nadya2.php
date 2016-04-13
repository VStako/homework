<?php
echo $_POST ['action'];
print_r($_POST);
$operation = $_POST ['action'];
$a = $_POST ['a'];
$b = $_POST ['b'];

if ($_POST['submit'])
{
    if ($operation=='+'){$c = $a + $b; echo "Сумма=" . $c.'<br>';}
    elseif ($operation=='-'){$d = $a - $b; echo "Разность=" . $d.'<br>';}
    elseif ($operation=='*'){$e = $a *$b;  echo  "Произведение=" . $e.'<br>';}
    elseif ($operation=='/' && $b != 0){$f = $a / $b; echo "Деление=" . $f;}
    elseif ($operation=='/' && $b == 0){echo "На 0 делить нельзя!";}
    else {echo "Операция не определена";}
}

