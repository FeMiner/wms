<?php
 include("../conn/conn.php");
 while(list($name,$value)=each($_POST))
  {
     
      mysql_query("delete from tb_inout where id='".$value."'",$conn);

  }
 header("location:inoutsetting.php"); 
?>