<?php 

error_reporting(E_ALL);
ini_set("display_errors",1);
ob_start();
session_start();

$host = "localhost";
$dbname = "portfolyo";
$user = "root";
$password = "123456789";


try {
	

	$db = new PDO("mysql:host=$host;dbname=$dbname;",$user,$password);
	



} catch (Exception $e) {

	echo $e->getMessage();
	
}


// Array ( [id] => 1 [baslik] => SİBER GÜVENLİK [aciklama] => ÇAĞIN EN GÜZEL SAVUNMASI [resim] => [tarih] => 2024-08-20 22:00:00 ) Array ( [id] => 2 [baslik] => PROGRAMLAMA [aciklama] => ÇAĞIN EN İYİ PROGRAM DİLLERİ [resim] => [tarih] => 2024-08-20 22:00:00 ) Array ( [id] => 3 [baslik] => WEB TASARIM [aciklama] => ÇAĞIN EN İYİ SİTELERİ [resim] => [tarih] => 2024-08-20 22:00:00 )

?>