<?php 
include ('bd.php');
$connect = connectDB();//подключение к бд 
$search = $_GET["searchtext"];//параметр поиска из input 
$startFrom = $_GET['startFrom'];//параметр поиска с какого ИД начинать вывод 
    $sql = "SELECT `guest_id`, `guest_name`, `guest_surname`, 'guest_country', `guest_card`
      FROM `guest` WHERE `guest_name` LIKE '%$search%'
      OR `guest_surname` LIKE '%$search%'
      OR `guest_card` LIKE '%$search%' ORDER BY `guest_id` DESC LIMIT {$startFrom}, 15";
      $regs = mysql_query($sql);
      if ($regs) {
        $num = mysql_num_rows($regs);      
        $i = 0;
        while ($i < $num) {
          $fn[$i] = mysql_fetch_assoc($regs);   
          $i++;
        }     
      $objsql = array('fn'=>$fn);  
      }
      else {
        $objsql = array('type'=>'error');
      }

  echo json_encode($objsql); 
closeDB ($connect);
?>