<?php

echo '<table border="1">';

for ($tr = 1; $tr <= 10; $tr++) {
    echo '<tr>';
    for ($td = 1; $td <= 10; $td++) {
        if ($td % 2) {
            if ($tr % 2) {
                $fo = "(";
                $fc = ")";
            } else {
                $fo = "";
                $fc = "";
            }
        } elseif (!($tr % 2)) {
            $fo = "[";
            $fc = "]";
        } else {
            $fo = "";
            $fc = "";
        }
        echo '<td>' . $fo . $tr * $td . $fc . '</td>';

    }
    echo '</tr>';
}

echo '</table>';


