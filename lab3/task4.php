<?php
$number1 = 66;
$number2 = 110;
$number3 = 20;
echo"number1 ".$number1."<br>";
echo"number2 ".$number2."<br>";
echo"number3 ".$number3."<br>";
if($number1>$number2 && $number1>$number3){
    echo " ". $number1." is largest";
}
if($number2>$number1 && $number2>$number3){
    echo " ". $number2." is largest";
}
if($number3>$number1 && $number3>$number2){
    echo " ". $number3." is largest";
}
?>