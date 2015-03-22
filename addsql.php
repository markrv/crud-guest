<?php
include ('bd.php');
$connect = connectDB();
while ($x++<100) {
 $sql = 'INSERT INTO guest(guest_id, guest_name, guest_surname, guest_country, guest_card)
 VALUES(NULL, "ajax'.$x.'", "test'.$x.'", "4", " 000000'.$x.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных о госте!</b></p></center>';
	echo $sql;}
 else
 {echo '<center><p><b>Данные о госте добавлены!</b></p></center>';}
}
  closeDB ($connect);
  ?>