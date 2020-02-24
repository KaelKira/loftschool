<?php
function task1()
{
    $file = file_get_contents('src/data.xml');
    $xml = new SimpleXMLElement($file);
    echo '<b>PurchaseOrderNumber: </b>'. $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo '<b>OrderDate: </b>'. $xml->attributes()->OrderDate;
    echo '<p>'."Адреса:" . '</p>';
    foreach ($xml->Address as $adres){
        echo '<p>';
        echo '<b>Type</b>: '. $adres->attributes()->Type . '<br>';
        echo 'Улица: '. $adres->Street->__toString() . '<br>';
        echo 'Город: '. $adres->City->__toString() . '<br>';
        echo 'Штат: '. $adres->State->__toString() . '<br>';
        echo 'Индекс: '. $adres->Zip->__toString() . '<br>';
        echo 'Страна: '. $adres->Country->__toString() . '<br>';
        echo '</p>';
    }
    foreach ($xml->Items->Item as $item){
        echo '<p>';
        echo '<b>PartNumber</b>: '. $item->attributes()->PartNumber . '<br>';
        echo 'Наименование товара: '. $item->ProductName->__toString() . '<br>';
        echo 'Количество: '. $item->Quantity->__toString() . '<br>';
        echo 'Цена: '. $item->USPrice->__toString() . '<br>';
        echo 'Комментарий: '. $item->Comment->__toString() . '<br>';
        echo 'Дата: '. $item->ShipDate->__toString() . '<br>';
        echo '</p>';
    }
    echo '<b>Комментарии к заказу: </b>'. $xml->DeliveryNotes->__toString();
}
