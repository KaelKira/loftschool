<?php
class basicTarif{

    public $pricePerKm = 10;
    public $pricePerMinet = 3;
    public $age = 0;
    public $dop = false;

    public function calculate($km, $time,$age){

        $price = $km*$this->pricePerKm + $time*$this->pricePerMinet;
        if ($age >= 18 && $age <= 21){
            $price = $price + $price*0.1;
        }
        echo 'Тариф базовый ('.$km.' км по '. $this->pricePerKm . ' руб. плюс '.$time.' мин. по '. $this->pricePerMinet . ' руб)'. ' общая стоимость: '. $price;
    }
}

class hourly extends basicTarif{
    public $pricePerKm = 0;
    public $pricePerMinet = 200;
}


$tarif= new basicTarif();
$tarif->calculate(10,50,21);