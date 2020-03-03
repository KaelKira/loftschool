<?php
require('function.php');
//Возраст меньше
$tarifBasic = new basicTarif(1, 60, 14);
$tarifBasic->calculate();
//Возраст больше
$tarifBasic = new basicTarif(1, 60, 70);
$tarifBasic->calculate();
//Коэффициент молодёжный
$tarifBasic = new basicTarif(1, 60, 21);
$tarifBasic->calculate();
//Без коэф молодёжный
$tarifBasic = new basicTarif(1, 60, 25);
$tarifBasic->calculate();
//Тариф почасовой с доп Водителем и GPS
$tarifHour = new hourlyTarif(true, true, 100, 60, 27);
$tarifHour->calculate();
//Тариф почасовой без допов, округление часов
$tarifHour = new hourlyTarif(false, false, 100, 121, 27);
$tarifHour->calculate();
//Тариф Студенческий
$tarifStud = new StudentTarif(1, 50, 24);
$tarifStud->calculate();
//Тариф Не валидный возраст
$tarifStud = new StudentTarif(1, 50, 26);
$tarifStud->calculate();