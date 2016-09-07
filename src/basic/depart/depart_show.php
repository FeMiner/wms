<?php
//权限验证——
include("../../const.php");
if ($authority[1]==0){  
	echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
	exit;
}
//权限验证——

	include "../include.php";
	include "../database.php";

	$pagesize = 10;//单页显示的项目数
	$page = $_GET['page'];//URL中没有定义page时，$page=0；当前页码=$page+1；

	$query="select count(*) as num from table_depart order by id";//echo $query."<br>";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	$num = $RS['num'];//计算数据库中的项目总数
	for($i=0;$i*$pagesize<$num;$i++)//$i表示显示所有的项目需要的页数
		$total=$i+1;
	$query="select * from table_depart order by id limit ".$page*$pagesize.",".($page+1)*$pagesize;//echo $query."<br>";
	$result = mysql_query($query);
	mysql_close();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>部门管理</title>
</head>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
body {
	width:800px;
	font-size:14px
}
thead {
	color: #330066
}
</style>
<body>
<h3 align="center">部门信息概览</h3>
<p><a href="depart_add.php">添加部门</a></p>
<table border="1" width="100%" cellspacing="0" cellpadding="5" bordercolor="#9999FF">
  <tr align="center" bordercolor="#9999FF">
    <td>部门编号</td>
    <td>部门名称</td>
    <td>部门主管</td>
    <td>部门电话</td>
    <td>修改</td>
    <td>删除</td>
  </tr>
  <?php 
	while($RS=mysql_fetch_array($result))
	{
		echo "<tr align='center' bordercolor='#9999FF'>";
		echo "<td>".$RS['id']."</td>\n";
		echo "<td>".$RS['name']."</td>\n";
		echo "<td>".$RS['major']."</td>\n";
		echo "<td>".$RS['phone']."</td>\n";
		echo "<td><a href='depart_modify.php?id=".$RS['id']."'><img src='../../image/modify.gif' alt='' border='0' /></a></td>\n";
		echo "<td><a href=\"javascript:if(confirm('确定？')) location.href='../sql_delete_bg.php?db=depart&id=".$RS['id']."'\">";
		echo "<img src='../../image/delete.gif' alt='' border='0' /></a></td>\n";
		echo "</tr>";
	}
?>
</table>
<p>
  <?php
$current=$page+1;
echo "第".$current."页，共".$total."页";
echo "&nbsp;&nbsp;跳页至";
echo "<select name='pagechoose' onchange='javascript:location.href=this.value;'>";
for($i=0;$i<$total;$i++){
	$string="";
	if($i==$page) $string=" selected='selected' ";
	$url_i = "depart_show.php?page=".$i;
	echo "<option value='".$url_i."'".$string.">". ($i+1) ."</option>" ;
	}
echo "</select>";

if($current<$total){
	echo "<a href='depart_show.php?page=".$current."'>下一页</a>";
}
if($current>1){
	$pre = $current-2;
	echo "<a href='depart_show.php?page=".$pre."'>上一页</a>";
}   
  
?>
</p>
</body>
</html>
