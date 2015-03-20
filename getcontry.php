<?php 
include ('bd.php');

$connect = connectDB();
$regs=mysql_query("SELECT `country_id`, `country_name`  FROM `country`");
 
if ($regs) {
    $num = mysql_num_rows($regs);      
    $i = 0;
    while ($i < $num) {
       $regions[$i] = mysql_fetch_assoc($regs);   
       $i++;
    }     
    $result = array('regions'=>$regions);  
}
else {
	$result = array('type'=>'запрос пустой');
}
closeDB ($connect);

//echo "<pre>";
//print_r ($result);
//echo "</pre>";
echo json_encode($result); 
//print var_dump($result)

/*
/*поисковdq запрос стран
function S_country () { 
$text = '';
  
    //Формируем строку поискового запроса 
    $sql = "SELECT `country_id`, `country_name`
      FROM `country` WHERE `guest_name` LIKE '%$query%'
      OR `guest_surname` LIKE '%$query%'
      OR `card` LIKE '%$query%'";
	// и выполняем его
    $result = mysql_query($sql);
    $end_result = '';
    if(mysql_num_rows($result) > 0) {
       while ($row = mysql_fetch_object($result)){
          $end_result .= $row->guest_name. " ". $row->guest_surname. " - ". $row->guest_country. " - ". $row->card. "\n";
       }
       $text =  $end_result;
    } else {
        $text =  '';
    } 
}
//Возвращаем сформированную строку поисковой выдачи
return $text; 
}


///////////// Сам скрипт обработчик ///////////////
  // Открываем соединение с базой данных
  $connect = connectDB();
  $search_country = S_country(); 
  echo $search_country; 
  // Закрываем соединение с  базой данных
  closeDB ($connect);*/
?>