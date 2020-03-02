<?php
function adm()
{
    $host = 'loftschool';
    $mysql = new mysqli($host, 'root', '', 'db_burg', 3306);

    $req = $mysql->query("SELECT * FROM users");
    $users = $req->fetch_all();

    echo '<table cellpadding="5" cellspacing="0" border="1">' . '<tr>
<th>ID</th>
<th>Email</th>
<th>Телефон</th>
<th>Кол-во заказов</th>
<th>Имя</th>
</tr>';
    foreach ($users as $key => $user) {
        echo "<tr>";
        foreach ($user as $userData) {
            echo "<td>" . $userData . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    $ords = $mysql->query("SELECT * FROM orders");
    $orders = $ords->fetch_all();
    echo '<table cellpadding="5" cellspacing="0" border="1">' . '<tr>
<th>ID</th>
<th>ID пользователя</th>
<th>Адрес</th>
<th>Комментарий</th>
<th>Оплата</th>
<th>Перезванивать</th>
</tr>';
    foreach ($orders as $key => $value) {
        echo "<tr>";
        foreach ($value as $data2) {
            echo "<td>" . $data2 . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}