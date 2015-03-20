
<?php 
 /* Открываем соединение с базой данных*/
function connectDB (){
// Определяем константы для соединения с базой данных
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 't7_bd');

//Пытаемся соединится с базой данных
$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PASS)
  or die("Ошибка соединения с базой данных! " . mysql_error());
//и выбрать таблицу
mysql_select_db(DB_NAME); 
// Устанавливаем кодировку
mysql_query('SET NAMES utf8');
//Возвращаем дескриптор соединения
return $dbconn;
}

/*Закрываем соединение с базой данных*/
function closeDB($dbconn){
mysql_close($dbconn);
}

?>


