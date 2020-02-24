<?php
function task1()
{
    $file = file_get_contents('src/data.xml');
    $xml = new SimpleXMLElement($file);
    echo '<b>PurchaseOrderNumber: </b>' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo '<b>OrderDate: </b>' . $xml->attributes()->OrderDate;
    echo '<p>' . "Адреса:" . '</p>';
    foreach ($xml->Address as $adres) {
        echo '<p>';
        echo '<b>Type</b>: ' . $adres->attributes()->Type . '<br>';
        echo 'Улица: ' . $adres->Street->__toString() . '<br>';
        echo 'Город: ' . $adres->City->__toString() . '<br>';
        echo 'Штат: ' . $adres->State->__toString() . '<br>';
        echo 'Индекс: ' . $adres->Zip->__toString() . '<br>';
        echo 'Страна: ' . $adres->Country->__toString() . '<br>';
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
    if (rand(0, 1) == 1) {
        echo "Меняем файл" . '<br>';
        $file = file_get_contents('src/output.json');
        $arr2 = json_decode($file);
        echo '<pre>';
        print_r($arr2);
        $arr2[rand(0, 2)][rand(0, 2)] = 'Data has been changed';
        echo '<pre>';
        print_r($arr2);
        $changedJson = json_encode($arr2);
        file_put_contents('src/output2.json', $changedJson);
        for ($i = 0; $i <= 2; $i++) {
            for ($j = 0; $j <= 2; $j++) {
                if ($arr[$i][$j] != $arr2[$i][$j]) {
                    echo 'Элемент массива ' . $arr[$i][$j] . ' не равен элементу массива ' . $arr2[$i][$j];
                }
            }
        }

    } else {
        echo 'Файл не меняли';
    }
}

function task3()
{
    for ($i = 0; $i < 51; $i++) {
        $arr[$i] = rand(0, 100);
    }
    $newFile = fopen('src/file.csv', 'w');
    fputcsv($newFile, $arr, ';');
    $newFile = fopen('src/file.csv', 'r');
    $newArr = $string = fgetcsv($newFile, 1000 * 1000, ';');
    $sum = 0;
    foreach ($newArr as $value) {
        if ($value % 2 == 0) {
            $sum += $value;
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
        if (isset($arr[$searchKey])) {
            echo $arr[$searchKey] . '<br>';
            $result[] = $arr[$searchKey];
        }
        foreach ($arr as $key => $param) {
            if (is_array($param)) {
                search_key($searchKey, $param);
            }
        }
        return $result;
    }

    echo search_key('pageid', $arr);
    echo search_key('title', $arr);
}
