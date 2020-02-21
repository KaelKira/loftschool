<?php

echo '<table border="1">';

for ($tr = 1; $tr <= 10; $tr++) {
    echo '<tr>';
    for ($td = 1; $td <= 10; $td++) {
        $result = $tr * $td;
        if ($td % 2 == 0 && $tr % 2 == 0) {  //читаем как «оба индекса четные»
            echo '<td>' . "(" . $result . ")" . '</td>';
        } elseif ($td % 2 != 0 && $tr % 2 != 0) { //оба индекса нечетные
            echo '<td>' . "[" . $result . "]" . '</td>';
        } else {
            echo $result;
        }
    }
    echo '</tr>';
}
echo '</table>';


