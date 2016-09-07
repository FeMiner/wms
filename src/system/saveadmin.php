<?php
session_start();
include("../conn/conn.php");
$flag=$_GET[flag];
$name=$_POST[adminname];
$pwd1=$_POST[pwd];
$pwd=md5($_POST[pwd]);
$state=$_POST[state];
echo $name;

for($k=0;$k<22;$k++)  //将数组对应的权限置0  
{

  $array[$k]=0;
}

for($i=0;$i<count($_POST[auth]);$i++)
{
    
    $array[$_POST[auth][$i]]=1;
}
$authority=implode(",",$array);

if($flag==1)   //新增用户
 {
    $sql=mysql_query("select * from tb_admin where name='".$name."'",$conn);
    $info=mysql_fetch_array($sql);
   if($info==true)
   {
      echo "<script>alert('该用户名已经存在!');history.back();</script>";
      exit;
	}
	else
	{
	    mysql_query("insert into tb_admin (name,pwd,authority,state) values('$name','$pwd','$authority','$state')",$conn);
	    echo "<script>alert('添加成功!');window.location='adminsetting.php';</script>";
	 }
 }
 
 else if(flag==0 and $state==2)
 {
    
	   mysql_query("delete from tb_admin where name='".$name."'",$conn);
	   echo "<script>alert('删除成功!');window.location='adminsetting.php';</script>";
      exit;
 }
 else
 {  
     
    if($pwd1="")
	{
	  $sql=mysql_query("select * from tb_admin where name='".$name."'",$conn);
      $info=mysql_fetch_array($sql);
      mysql_query("update tb_admin set name='$name',authority='$authority',state='$state' where name='".$name."'",$conn);
	}
	else
	{
	
	   mysql_query("update tb_admin set name='$name',pwd='$pwd',authority='$authority',state='$state' where name='".$name."'",$conn);
	}
	
    echo "<script>alert('修改成功!');window.location='adminsetting.php';</script>";
 }
?>
