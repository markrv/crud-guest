<?php 
include ('bd.php');

$connect = connectDB();
 $search = $_GET["s"];
    $sql = "SELECT `guest_id`, `guest_name`, `guest_surname`, `guest_country`, 'card'
      FROM `guest` WHERE `guest_name` LIKE '%$search%'
      OR `guest_surname` LIKE '%$search%'
      OR `card` LIKE '%$search%'";
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
  closeDB ($connect);
  echo json_encode($objsql); 
?>