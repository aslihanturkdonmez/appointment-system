<?php 


$server='localhost';
$user='root';
$password='';
$database='randevu_sistemi';
$baglanti=mysqli_connect($server,$user,$password,$database);
$baglanti->set_charset("utf8");
$db=new PDO("mysql:host=localhost;dbname=randevu_sistemi;charset=utf8", "root","");

if(!$baglanti){

    echo "MySQL sunucu ile bağlanamadı! </br>";
    echo "HATA: ".mysqli_connect_error();
    exit;

} 
?>