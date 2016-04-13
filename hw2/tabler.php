<?php random_table();?>
<?php

function random_table(){
//$colors = array('red','yellow','blue','gray','maroon','brown','green');
    $colors = array('#F55F5F','#FCF682','#78AFFF','#AFBFCE','#E195FF','#E4AA46','#7FF28A');

    $rows = rand(30,50);
    $cols = rand(40,50);

    ?> <table> <?php
        for($i=0; $i<$rows; $i++){
            ?><tr><?php
            for($j=0; $j<$cols; $j++){
                $random_number = rand(1000, 10000);
                $random_color = rand(0, count($colors)-1);
                ?> <td style='background-color: <?=$colors[$random_color]?>; border : 2px solid black'> <?php echo $random_number; ?> </td> <?php
            }
            ?> </tr> <?php
        }
        ?> </table> <?php
}