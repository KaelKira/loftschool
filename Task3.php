<?php
$age = 0;
if($age >= 18 ){
    if($age <= 65){
        echo "Вам еще работать и работать";
    }else{
        echo "Вам пора на пенсию";
    }

}elseif($age >= 1){
    echo "Вам ещё рано работать";
}else{
    echo "Неизвестный возраст";
}