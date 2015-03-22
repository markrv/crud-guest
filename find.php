<?php 
include ('bd.php');

$connect = connectDB();//подключение к бд 
$search = $_GET["searchtext"];//параметр поиска из 
$func = $_GET["func"];//параметр поиска из 
if($func=="first"){ /////// первые 5
    $sql = "SELECT `guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card'
      FROM `guest` WHERE `guest_name` LIKE '%$search%'
      OR `guest_surname` LIKE '%$search%'
      OR `card` LIKE '%$search%' ORDER BY `guest_id` DESC LIMIT 5";
      $regs = mysql_query($sql);
      // $objsql = mysql_fetch_object ( $regs );
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
    $objsql = array('type'=>'запрос пустой');
  }

  echo json_encode($objsql); 
}

if($func=="ajax"){ /////// aajax
$startFrom = $_GET['startFrom'];
    $sql = "SELECT `guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card'
      FROM `guest` WHERE `guest_name` LIKE '%$search%'
      OR `guest_surname` LIKE '%$search%'
      OR `card` LIKE '%$search%' ORDER BY `guest_id` DESC LIMIT {$startFrom}, 5";
      $regs = mysql_query($sql);
      // $objsql = mysql_fetch_object ( $regs );
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
    $objsql = array('type'=>'запрос пустой');
  }

  echo json_encode($objsql); 
} 
closeDB ($connect);
?>