<?php
/*echo
for($i=0; $i<10=;$i++){
    for($j=0; $j<10=;$j++){

    }
}*/


echo '<table border="1">';

for ($tr = 1; $tr <= 10; $tr++) {
    echo '<tr>';
    for ($td = 1; $td <= 10; $td++) {
        if(){
            echo '<td>[' . $tr * $td . '] </td>';
        }else{
            echo '<td>(' . $tr * $td . ')</td>';
        }

    }
    echo '</tr>';
}

echo '</table>';


