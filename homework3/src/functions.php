<?php
function task1()
{
    $file = file_get_contents('src/data.xml');
    $xml = new SimpleXMLElement($file);
    echo '<b>PurchaseOrderNumber: </b>' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo '<b>OrderDate: </b>' . $xml->attributes()->OrderDate;
    echo '<p>' . "Адреса:" . '</p>';
    foreach ($xml->Address as $adress) {
        echo '<p>';
        echo '<b>Type</b>: ' . $adress->attributes()->Type . '<br>';
        echo 'Улица: ' . $adress->Street->__toString() . '<br>';
        echo 'Город: ' . $adress->City->__toString() . '<br>';
        echo 'Штат: ' . $adress->State->__toString() . '<br>';
        echo 'Индекс: ' . $adress->Zip->__toString() . '<br>';
        echo 'Страна: ' . $adress->Country->__toString() . '<br>';
        echo '</p>';
    }
    echo '<b>Комментарии к заказу: </b>' . $xml->DeliveryNotes->__toString();
    foreach ($xml->Items->Item as $item) {
        echo '<p>';
        echo '<b>PartNumber</b>: ' . $item->attributes()->PartNumber . '<br>';
        echo 'Наименование товара: ' . $item->ProductName->__toString() . '<br>';
        echo 'Количество: ' . $item->Quantity->__toString() . '<br>';
        echo 'Цена: ' . $item->USPrice->__toString() . '<br>';
        echo 'Комментарий: ' . $item->Comment->__toString() . '<br>';
        echo 'Дата: ' . $item->ShipDate->__toString() . '<br>';
        echo '</p>';
    }
}

function task2()
{
    $flag = true;
    $arr = [
        0 =>
            array(
                0 => "Test1",
                1 => "1",
                2 => "NY"
            ),
        1 =>
            array(
                0 => "Test2",
                1 => "2",
                2 => "Tokio"
            ),
        2 =>
            array(
                0 => "Test3",
                1 => "3",
                2 => "Moscow"
            ),
    ];
    $jsonArr = json_encode($arr);
    file_put_contents('src/output.json', $jsonArr);
    $file = file_get_contents('src/output.json');
    if (rand(0, 1) == 1) {
        $arr2 = json_decode($file);
        $arr2[rand(0, 2)][rand(0, 2)] = 'Data has been changed';
        $changedJson = json_encode($arr2);
        file_put_contents('src/output2.json', $changedJson);
    } else {
        file_put_contents('src/output2.json', $file);
    }
    $file = file_get_contents('src/output2.json');
    $arr2 = json_decode($file);
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    print_r($arr2);
    for ($i = 0; $i <= 2; $i++) {
        for ($j = 0; $j <= 2; $j++) {
            if ($arr[$i][$j] != $arr2[$i][$j]) {
                echo 'Элемент массива ' . $arr[$i][$j] . ' не равен элементу массива ' . $arr2[$i][$j];
                $flag = false;
                break 2;
            }
        }
    }
    if ($flag) {
        echo "Все элементы равны";
    }
}

function task3()
{
    for ($i = 0; $i < 51; $i++) {
        $arr[$i] = rand(0, 100);
    }
    $newFile = fopen('src/file.csv', 'w');
    fputcsv($newFile, $arr, ';');
    fclose($newFile);
    $newFile = fopen('src/file.csv', 'r');
    $numbers = fgetcsv($newFile, 1000 * 1000, ';');
    fclose($newFile);
    $sum = 0;
    foreach ($numbers as $number) {
        if ($number % 2 == 0) {
            $sum += $number;
        }
    }
    echo 'Сумма чётных чисел равна = ' . $sum;
}

function task4()
{
    $url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
    $file = file_get_contents($url);
    $arr = json_decode($file, true);
    function search_key($searchKey, array $arr)
    {
        foreach ($arr as $key => $param) {
            if (is_array($param)) {
                $result = search_key($searchKey, $param);
            } elseif ($key === $searchKey) {
                $result = $arr[$key];
                break;
            }
        }
        return !empty($result) ? $result : null;
    }

    echo search_key('pageid', $arr).'<br>';
    echo search_key('title', $arr);
}