<?php
include("../conn/conn.php");
$type=$_POST[type];
$name=$_POST[name];
$cost=$_POST[cost];
$id=$_GET[id];
if($id!="")
{
       $sql=mysql_query("select * from tb_inout where id='".$id."'",$conn);
      $info=mysql_fetch_array($sql);
	  mysql_query("update tb_inout set type='$type',cost='$cost' where id='".$id."'",$conn);
	  echo "<script>alert('修改成功!');window.location='inoutsetting.php';</script>";
}
else
{ 
    $sql=mysql_query("select * from tb_inout where name='".$name."'",$conn);
   $info=mysql_fetch_array($sql);
   if($info==true)
   {
      echo "<script>alert('该类别已经存在!');history.back();</script>";
      exit;
	}
	else
	{
	    mysql_query("insert into tb_inout(type,name,cost) values('$type','$name','$cost')",$conn);
	    echo "<script>alert('添加成功!');history.back();</script>";
	 }
}


?>
