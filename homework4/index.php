<?php

interface  iCalc
{
    public function checkAge($age);
    public function multiplaer($age);
    public function calculate($km, $time, $age);
}

abstract class Basis implements iCalc
{

    public $pricePerKm = 10;
    public $pricePerMinet = 3;
    public $tarifName = 'Базовый';

    public function checkAge($age)
    {
        if ($age < 18) {
            echo 'Возраст меньше 18 лет. Нельзя садиться за руль.';
            return false;
        } elseif ($age > 65) {
            echo 'Возраст больше 65 лет. Нельзя садиться за руль.';
            return false;
        }
        return true;
    }

    //повышающий коэффициент возраста
    public function multiplaer($age){
        if ($age >= 18 && $age <= 21) {
            $coefficient = 1.1;
        }else{
            $coefficient = 1;
        }
        return $coefficient;
    }
    public function calculate($km, $time, $age)
    {
        if ($this->checkAge($age) === true){
            $price = $km * $this->pricePerKm + $time * $this->pricePerMinet;
            $price = $price * $this->multiplaer($age);
            echo 'Тариф ' . $this->tarifName . ' (' . $km . ' км по ' . $this->pricePerKm . ' руб. плюс ' . $time . ' мин. по ' . $this->pricePerMinet . ' руб)' . ' общая стоимость: ' . $price . '<br>';
        }else{
            return;
        }
    }
}

class basicTarif extends Basis
{

    public $pricePerKm = 10;
    public $pricePerMinet = 3;
}

class hourlyTarif extends Basis
{
    public $pricePerKm = 0;
    public $pricePerMinet = 200;
    public $tarifName = 'Почасовой';

    public function round($time)
    {
        $hour = 0;
        if ($time > 0) {
            $hour = 1;
        }
        $flag = true;
        while ($flag == true) {
            if (($time - 60) > 0) {
                $time = $time - 60;
                $hour++;
            } else {
                $flag = false;
            }
        }
        return $hour;
    }

    public function calculate($km, $time, $age)
    {
        $price = $km * $this->pricePerKm + $this->round($time) * $this->pricePerMinet;
        $price = $price * $this->multiplaer($age);
        echo 'Тариф ' . $this->tarifName . ' (' . $km . ' км по ' . $this->pricePerKm . ' руб. плюс ' . $this->round($time) . ' часа. по ' . $this->pricePerMinet . ' руб)' . ' общая стоимость: ' . $price . '<br>';
    }
}
class StudentTarif extends Basis{
    public $pricePerKm = 4;
    public $pricePerMinet = 1;
    public $tarifName = 'Студенческий';

    public function checkAge($age)
    {
        if ($age < 18) {
            echo 'Возраст меньше 18 лет. Нельзя садиться за руль.';
            return false;
        } elseif ($age > 65) {
            echo 'Возраст больше 65 лет. Нельзя садиться за руль.';
            return false;
        }elseif ($age > 25){
            echo 'Тариф Студенческий доступен только для  лиц не старше 25 лет.';
            return false;
        }
        return true;
    }

}


$tarifBasic= new basicTarif();
$tarifBasic->calculate(1,10,40);
$tarifHour = new hourlyTarif();
$tarifHour->calculate(1,121,20);
$tarifStud = new StudentTarif();
$tarifStud->calculate(1,1,26);