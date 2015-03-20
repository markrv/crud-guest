<?php
// 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card' 
include ('bd.php');
$connect = connectDB();
 $guest_name = $_POST['g_name']; // передаем переменной g_name значение глобального массива POST
 $guest_surname = $_POST['g_surname']; 
 $guest_country = $_POST['g_country'];
 $card = $_POST['card'];
 $sql = 'INSERT INTO guest(guest_id, guest_name, guest_surname, guest_country, card)
 VALUES(NULL, "'.$guest_name.'", "'.$guest_surname.'", "'.$guest_country.'", "'.$card.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных!</b></p></center>';
	echo $sql;}
 else
 {echo '<center><p><b>Данные добавлены!</b></p></center>';}
  closeDB ($connect);
?>