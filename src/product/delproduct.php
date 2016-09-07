<?php
 include("../conn/conn.php");
 while(list($name,$value)=each($_POST))
  {
      $sql=mysql_query("select tupian from tb_product where id='".$value."'",$conn);
	  $info=mysql_fetch_array($sql);
	  if($info[tupian]!="")
	  {
	     @unlink(substr($info[tupian],6,(strlen($info[tupian])-6)));
		
	  }
	  
      mysql_query("delete from tb_product where id='".$value."'",$conn);
  }
 header("location:showproduct.php?mtype=1&stype=1"); 
?>