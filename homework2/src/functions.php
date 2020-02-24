<?php
function task1($arraOfString, $glue)
{
    if ($glue === false) {
        foreach ($arraOfString as $string) {
            echo '<p>' . $string . '</p>';
        }
    } else {
        return implode($arraOfString);
    }
}

function task2(string $operator, ...$numbers)
{
    $args = func_get_args();
    array_shift($args);
    $iMax = count($args);

    switch ($operator) {
        case '+':
            $result = $args[0];
            for ($i = 1; $i < $iMax; $i++) {
                $result += $args[$i];
            }
            echo implode($operator, $args);
            echo '=' . $result;
            break;
        case '-':
            $result = $args[0];
            for ($i = 1; $i < $iMax; $i++) {
                $result -= $args[$i];
            }
            echo implode($operator, $args);
            echo '=' . $result;
            break;
        case '*':
            $result = $args[0];
            for ($i = 1; $i < $iMax; $i++) {
                $result *= $args[$i];
            }
            echo implode($operator, $args);
            echo '=' . $result;
            break;
        case '/':
            $result = $args[0];
            for ($i = 1; $i < $iMax; $i++) {
                if ($args[$i] == 0) {
                    echo 'На ноль делить не стоит. Замените нулевой аргумент';
                    return $result;
                }
                $result /= $args[$i];
            }
            echo implode($operator, $args);
            echo '=' . $result;
            break;
        default:
            echo 'Не известный оператор';
    }
}

function task3($rows, $cols)
{
    if (is_int($rows) && is_int($cols)) {
        echo '<table border="1">';
        for ($i = 1; $i <= $rows; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $cols; $j++) {
                $result = $i * $j;
                echo '<td>' . $result . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
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
    echo str_replace('К', '', $changestr) . PHP_EOL;

    $str = 'Две бутылки лимонада';
    echo $changed2 = str_replace('Две', 'Три', $str);
}

function task6($fileName)
{
    file_put_contents($fileName, 'Hello again!');
    echo file_get_contents($fileName);
}