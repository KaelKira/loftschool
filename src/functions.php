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
                if($args[$i] == 0){
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