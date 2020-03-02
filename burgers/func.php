<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $array['name'] = $_POST['name'];
    $array['phone'] = $_POST['phone'];
    $array['email'] = $_POST['email'];
    $array['street'] = $_POST['street'];
    $array['home'] = $_POST['home'];
    $array['street'] = $_POST['street'];
    $array['part'] = $_POST['part'];
    $array['appt'] = $_POST['appt'];
    $array['floor'] = $_POST['floor'];
    $array['comment'] = $_POST['comment'];
    $array['payment_card'] = $_POST['payment_card'];
    $array['payment_change'] = $_POST['payment_change'];
    $array['callback'] = $_POST['callback'];
}

if ($array['callback'] == 'on') {
    $array['callback'] = 'Не звонить';
} else {
    $array['callback'] = 'Перезвонить';
}
if ($array['payment_card'] == 'on') {
    $array['payment'] = 'Оплата картой';
} else {
    $array['payment'] = 'Оплата наличными';
}
$host = 'loftschool';
$mysql = new mysqli($host, 'root', '', 'db_burg', 3306);

if (mysqli_connect_errno()) {
    echo 'Конекшен ерор' . mysqli_connect_error();
    die;
}
//Чекаем запись
$req = $mysql->query("SELECT * FROM users");
$data = [];
while ($element = $req->fetch_assoc()) {
    $data[] = $element;
}
$needcreate = 1;
foreach ($data as $user) {
    if ($array['email'] == $user['email']) {
        $needcreate = 0;
        $userID = $user['id'];
    }
}
//Создаём нового пользователя в базе данных
if ($needcreate == 1) {
    //echo 'Новый пользователь создаётся' . '<br>';
    $tempemail = $array["email"];
    $tempphone = $array["phone"];
    $tempname = $array["name"];
    $ret = $mysql->query("INSERT INTO USERS (`email`,`phone`,`name`) VALUES ('$tempemail','$tempphone','$tempname')");
    if (!$ret) {
        echo "Ошибка" . $mysql->error . '<br>';
    }
    echo 'last_insert_id = ' . $mysql->insert_id . '<br>';
    $userID = $mysql->insert_id;
}

// Запись в таблицу заказа
$addres = "Улица " . $array["street"] . ',' . $array['home'] . 'к' . $array['part'] . ' кв ' . $array['appt'] . ' этаж ' . $array['floor'];

$comment = $array['comment'];
$payment = $array['payment'];
$callback = $array['callback'];
$ord = $mysql->query("INSERT INTO ORDERS (`user_id`,`adress`,`comment`,`payment`,`callback`) VALUES ('$userID','$addres','$comment','$payment','$callback')");
if (!$ord) {
    echo $mysql->error . '<br>';
    die;
} else {
    echo 'Ваш заказ принят, ожидайте курьера.' . '<br>';
    $order = $mysql->insert_id;
}
$req = $mysql->query("SELECT total_count FROM users WHERE id = '$userID'");
$req2 = $req->fetch_assoc();
$totalorder = $req2["total_count"];
$totalorder++;
$ord = $mysql->query("UPDATE users SET total_count = '$totalorder' WHERE id = '$userID'");
if ($totalorder == 1) {
    $ordertext = 'Спасибо - это ваш первый заказ';
} else {
    $ordertext = 'Спасибо! Это уже ' . $totalorder . ' заказ';
}
$string = '<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>Заказ номер ' . $order . '<br>' .
    "Ваш заказ будет доставлен по адресу: " . $addres . '<br>' .
    "Заказ: " . "DarkBeefBurger за 500 рублей, 1 шт" . '<br>' .
    $ordertext . '</body>
</html>';
file_put_contents('NewOrderMail.html', $string);

