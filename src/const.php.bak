<?php
   session_start();
   include("conn/conn.php");
   $sql=mysql_query("select * from tb_admin where name='".$_SESSION[username]."'",$conn);
   //$sql=mysql_query("select * from tb_admin where name='".tsoft."'",$conn);
   $info=mysql_fetch_array($sql);
   $authority=explode(",",$info[authority]);
?>
