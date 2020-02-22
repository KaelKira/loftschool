<?php
function task1($arraOfString, $glue)
{
    $result = '';
    foreach ($arraOfString as $string) {
        if ($glue == FALSE) {
            $result .= "<p>" . $string . "</p>";
        } else {
            $result .= $string;
        }
    }
    if ($glue == FALSE) {
        echo $result;
    } else {
        return $result;
    }
}

function task2(string $operator)
{
    $args = func_get_args();
    $iMax = count($args);

    switch ($operator) {
        case '+':
            $result = 0;
            for ($i = 1; $i < $iMax; $i++) {
                $result += $args[$i];
            }
            break;
        case '-':
            $result = $args[1];
            for ($i = 2; $i < $iMax; $i++) {
                $result -= $args[$i];
            }
            break;
        case '*':
            $result = 1;
            for ($i = 1; $i < $iMax; $i++) {
                $result *= $args[$i];
            }
            break;
        case '/':
            $result = $args[1];
            for ($i = 2; $i < $iMax; $i++) {
                if ($args[$i] == 0) {
                    $result = 'На ноль делить не стоит. Замените нулевой аргумент';
                    return $result;
                }
                $result /= $args[$i];
            }
            break;
        default:
            $result = 'Не известный оператор';
    }
    return $result;
}

function task3(int $int, int $int2)
{
    if (is_int($int) && is_int($int2)) {
        echo '<table border="1">';
        for ($i = 1; $i <= $int; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $int2; $j++) {
                $result = $i * $j;
                echo '<td>'. $result . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }else{
        echo 'Аргументы должны быть целые числа';
    }

}

function task4()
{
    echo date("d.m.Y H:i") . PHP_EOL;
    echo mktime(0, 0, 0, 02, 24, 2016);

}

function task5()
{
    $changestr = 'Карл у Клары украл Кораллы';
    $changed = preg_replace('/К/', '', $changestr);
    echo $changed . PHP_EOL;

    $str = 'Две бутылки лимонада';
    $strchng = '/Две/';
    $strrepl = 'Три';
    $changed2 = preg_replace($strchng, $strrepl, $str);
    echo $changed2;
}

function task6()
{
    file_put_contents('test.txt', 'Hello again!');
    echo file_get_contents('test.txt');
}

task3(1,2);