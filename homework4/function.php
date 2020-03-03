<?php

trait dopDriver
{
    public function addDriverPrice()
    {
        return 100;
    }
}

trait dopGps
{
    public function addGpsPrice($time)
    {
        $pricePerHourdGps = 15;
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
        $addPrice = $hour * $pricePerHourdGps;
        return $addPrice;
    }
}

interface  iCalc
{
    public function checkAge();

    public function multiplaer();

    public function calculate();
}

abstract class Basis implements iCalc
{

    public $pricePerKm = 10;
    public $pricePerMinet = 3;
    public $tarifName = 'Базовый';
    public $price = 0;
    public $km = 0;
    public $time = 0;
    public $age = 0;

    public function __construct($km, $time, $age)
    {
        $this->time = $time;
        $this->km = $km;
        $this->age = $age;
    }


    public function calculate()
    {
        if ($this->checkAge() === true) {
            $this->price = $this->km * $this->pricePerKm + $this->time * $this->pricePerMinet;
            $this->price = $this->price * $this->multiplaer();
            $str = 'Тариф ' . $this->tarifName . ' (' . $this->km . ' км по ' . $this->pricePerKm . ' руб. плюс ' . $this->time . ' мин. по ' . $this->pricePerMinet . ' руб)';
            $result = ' общая стоимость = ' . $this->price . '<br>';
            if ($this->multiplaer() == 1.1) {
                $strcoefficient = ' умножить на коэффициент молодёжный 1.1 ';
            } else {
                $strcoefficient = '';
            }
            echo $str . $strcoefficient . $result;
        } else {
            return;
        }
    }

    //повышающий коэффициент возраста

    public function checkAge()
    {
        if ($this->age < 18) {
            echo 'Возраст меньше 18 лет. Нельзя садиться за руль.' . '<br>';
            return false;
        } elseif ($this->age > 65) {
            echo 'Возраст больше 65 лет. Нельзя садиться за руль.' . '<br>';
            return false;
        }
        return true;
    }

    public function multiplaer()
    {
        if ($this->age >= 18 && $this->age <= 21) {
            $coefficient = 1.1;
        } else {
            $coefficient = 1;
        }
        return $coefficient;
    }
}

class basicTarif extends Basis
{

}

class hourlyTarif extends Basis
{
    use dopDriver;
    use dopGps;

    public $pricePerKm = 0;
    public $pricePerMinet = 200;
    public $tarifName = 'Почасовой';
    public $dopDriver = false;
    public $dopGps = false;

    public function __construct($dopDriver, $dopGps, $km, $time, $age)
    {
        $this->time = $time;
        $this->km = $km;
        $this->age = $age;
        $this->dopDriver = $dopDriver;
        $this->dopGps = $dopGps;

        if ($dopDriver) {
            $this->price = $this->price + $this->addDriverPrice();
        }
        if ($dopGps) {
            $this->price = $this->price + $this->addGpsPrice($this->time);
        }
    }

    public function calculate()
    {
        if ($this->checkAge() === true) {
            $this->price = $this->price + ($this->km * $this->pricePerKm + $this->round() * $this->pricePerMinet);
            $this->price = $this->price * $this->multiplaer();
            $str = 'Тариф ' . $this->tarifName . ' (' . $this->km . ' км по ' . $this->pricePerKm . ' руб. плюс ' . $this->round() . ' час. по ' . $this->pricePerMinet . ' руб)';
            $result = ' общая стоимость = ' . $this->price . '<br>';
            if ($this->multiplaer() == 1.1) {
                $strcoefficient = ' умножить на коэффициент молодёжный 1.1 ';
            } else {
                $strcoefficient = '';
            }
            if ($this->dopDriver) {
                $strDopDriver = ' плюс 100 руб за дополнительного водителя ';
            } else {
                $strDopDriver = '';
            }
            if ($this->dopGps) {
                $strDopGpsr = ' плюс 15 руб в час за GPS ';
            } else {
                $strDopGpsr = '';
            }
            echo $str . $strcoefficient . $strDopDriver . $strDopGpsr . $result;
        } else {
            return;
        }
    }

    public function round()
    {
        $time = $this->time;
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
}

class StudentTarif extends Basis
{
    public $pricePerKm = 4;
    public $pricePerMinet = 1;
    public $tarifName = 'Студенческий';

    public function checkAge()
    {
        if ($this->age < 18) {
            echo 'Возраст меньше 18 лет. Нельзя садиться за руль.';
            return false;
        } elseif ($this->age > 65) {
            echo 'Возраст больше 65 лет. Нельзя садиться за руль.';
            return false;
        } elseif ($this->age > 25) {
            echo 'Тариф Студенческий доступен только для  лиц не старше 25 лет.';
            return false;
        }
        return true;
    }

}