<?php
include ('bd.php');
$func=$_GET["f"];

if($func=="getcontry"){ ///////////////алгоритм вывода списка стран в селект
	$connect = connectDB();
	$regs=mysql_query("SELECT `country_id`, `country_name`  FROM `country`");
 
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
		$result = array('type'=>'error');
	}
	closeDB ($connect);
	echo json_encode($result); 
}

if($func=="addguest"){ ///////////////алгоритм добавления записи гостя в бд
// 'guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'guest_card' 
$connect = connectDB();
 $guest_name = $_POST['g_name']; // передаем переменной g_name значение глобального массива POST
 $guest_surname = $_POST['g_surname']; 
 $guest_country = $_POST['g_country'];
 $gue_card = $_POST['g_card'];
 $sql = 'INSERT INTO guest(guest_id, guest_name, guest_surname, guest_country, guest_card)
 VALUES(NULL, "'.$guest_name.'", "'.$guest_surname.'", "'.$guest_country.'", "'.$gue_card.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных о госте!</b></p></center>';
closeDB ($connect);	//echo $sql;
}
 else
 {closeDB ($connect); header('Location: index.html');}
}

if($func=="addcountry"){///////////////добавлени записи стрыны в бд
// 'country_id`, 'country_name'
$connect = connectDB();
 $country_name = $_POST['add_countru']; // передаем переменной g_name значение глобального массива POST
 $sql = 'INSERT INTO country(country_id, country_name)
 VALUES(NULL, "'.$country_name.'");';
// проверка
 if(!mysql_query($sql))
 {echo '<center><p><b>Ошибка при добавлении данных о стране!</b></p></center>';closeDB ($connect); 
}
 else
 {closeDB ($connect);header('Location: index.html'); }
}

if($func=="delcountry"){///////////////удалить записи стрыны в бд
// 'country_id`, 'country_name'
	/*  DELETE FROM country WHERE country_id = $country_id
		DELETE FROM guest WHERE guest_country LIKE $country_id
		; DELETE FROM guest WHERE guest_country LIKE '.$country_id.'
	*/
$connect = connectDB();
 $country_id = $_POST['del_country']; // передаем переменной g_name значение глобального массива POST
 $sql = 'DELETE FROM country 
 WHERE country_id = '.$country_id.';';
 $sql2 = 'DELETE FROM guest WHERE guest_country ='. $country_id.';';
// проверка
 if(!mysql_query($sql) || !mysql_query($sql2))
 {echo '<center><p><b>Ошибка при удалении данных о стране!</b></p></center>';
closeDB ($connect);}
 else
 {closeDB ($connect); header('Location: index.html'); 
}
}
?>