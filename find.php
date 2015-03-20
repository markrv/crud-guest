<?php 
include ('bd.php');

/*Обработка поискового запроса*/
function search ($query) { 
$text = '';

// Проводим фильтрацию данных
$query = trim($query);                     // Обрезаем пробелы и спецсиволы
$query = strip_tags($query);               // Удаляем HTML и PHP теги
$query = mysql_real_escape_string($query); // Экранируем специальные символы

  
//Поисковый запрос не пустой?
if (!empty($query)){
  if (strlen($query) < 4) {
    $text = 'короткий поисковый запрос';
  }elseif (strlen($query) > 128) {
    $text = 'длинный поисковый запрос';
  } else {
    //Формируем строку поискового запроса 
    $sql = "SELECT `guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card'
      FROM `guest` WHERE `guest_name` LIKE '%$query%'
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
        $text =  'По вашему запросу ничего не найдено';
    } 
  } 
}else {
  $text = 'Задан пустой поисковый запрос.';
}
//Возвращаем сформированную строку поисковой выдачи
return $text; 
}
///////////// Сам скрипт обработчик ///////////////
if (isset ($_POST['query']) && !empty($_POST['query'])){ 
  // Открываем соединение с базой данных
  $connect = connectDB();
  $search_result = search ($_POST['query']); 
  echo $search_result; 
  // Закрываем соединение с  базой данных
  closeDB ($connect);
}
?>