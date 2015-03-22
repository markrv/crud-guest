<?php
include ('bd.php');
$func=$_GET["f"];

///////////////вывод списка стран в селект
if($func=="getcontry"){ 
	$connect = connectDB();
	$regs=mysql_query("SELECT `country_id`, `country_name`  FROM `country`");
    // $objsql = mysql_fetch_object ( $regs );
	if ($regs) {
 	   $num = mysql_num_rows($regs);      
 	   $i = 0;
 	   while ($i < $num) {
 	      $country[$i] = mysql_fetch_assoc($regs);   
 	      $i++;
	    }     
	    $result = array('country'=>$country);  
	}
	else {
		$result = array('type'=>'запрос пустой');
	}
	closeDB ($connect);
	echo json_encode($result); 
}

///////////////добавлени записи гостя в бд
if($func=="addguest"){ 
// 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card' 
$connect = connectDB();
 $guest_name = $_POST['g_name']; // передаем переменной g_name значение глобального массива POST
 $guest_surname = $_POST['g_surname']; 
 $guest_country = $_POST['g_country'];
 $card = $_POST['card'];
 $sql = 'INSERT INTO guest(guest_id, guest_name, guest_surname, guest_country, card)
 VALUES(NULL, "'.$guest_name.'", "'.$guest_surname.'", "'.$guest_country.'", "'.$card.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных о госте!</b></p></center>';
	echo $sql;}
 else
 {echo '<center><p><b>Данные о госте добавлены!</b></p></center>';}
  closeDB ($connect);
}
///////////////добавлени записи стрыны в бд
if($func=="addcountry"){
// 'country_id`, 'country_name'
$connect = connectDB();
 $country_name = $_POST['add_countru']; // передаем переменной g_name значение глобального массива POST
 $sql = 'INSERT INTO country(country_id, country_name)
 VALUES(NULL, "'.$country_name.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных о стране!</b></p></center>';
	echo $sql;}
 else
 {echo '<center><p><b>Данные о стране добавлены!</b></p></center>';}
  closeDB ($connect);
}

///////////////удалить записи стрыны в бд!!!!!!!!!!!!!!
if($func=="delcountry"){
// 'country_id`, 'country_name'
	/*  DELETE FROM country WHERE country_id = $country_id
		DELETE FROM guest WHERE guest_country LIKE $country_id
		; DELETE FROM guest WHERE guest_country LIKE '.$country_id.'
	*/
$connect = connectDB();
 $country_id = $_POST['del_country']; // передаем переменной g_name значение глобального массива POST
 $sql = 'DELETE FROM country 
 WHERE country_id = '.$country_id.'; DELETE FROM guest WHERE guest_country = '.$country_id.';';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при удалении данных о стране!</b></p></center>';
	echo $sql;}
 else
 {echo '<center><p><b>Данные о стране удалены!</b></p></center>';}
  closeDB ($connect);
}
?>