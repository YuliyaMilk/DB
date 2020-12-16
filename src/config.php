<?php
$con = mysqli_connect("localhost","root","", "database") or die(mysqli_error($con));
if(!$con){
    echo' Ошибка соединения: ' . mysqli_connect_error() . '<br>';
    echo' Код ошибки: ' . mysqli_connect_errno() ;
}