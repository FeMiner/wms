<?php
//权限验证——
include("../../const.php");
if ($authority[3]==0){  
	echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
	exit;
}
//权限验证——

	include "../include.php";
	include "../database.php";
	
	$pagesize = 10;//单页显示的项目数
	$page = $_GET['page'];//URL中没有定义page时，$page=0；当前页码=$page+1；
	$orderby = $_GET['orderby'];//URL中没有定义orderby时，$orderby=0，使用默认排序方式
	
	$query="select count(*) as num from table_warehouse";//echo $query."<br>";
	$result = mysql_query($query) or die("Invalid query: " . mysql_error());
	$RS = mysql_fetch_array($result);
	$num = $RS['num'];//计算数据库中的项目总数
	for($i=0;$i*$pagesize<$num;$i++);//计算显示所有的项目需要的页数
	$total=$i;
	
	$string_order=" order by name";
	$string_page=" limit " . $page*$pagesize . "," . ($page+1)*$pagesize;
	
	$query="select * from table_warehouse" . $string_order . $string_page;//echo $query."<br>";
	$result = mysql_query($query) or die("Invalid query: " . mysql_error());
	mysql_close();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>仓库管理</title>
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
<body style="width:800px">
<h3 align="center">仓库信息概览</h3>
<div>
<p><a href="warehouse_add.php">添加仓库</a></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#9999FF">
  <thead><tr align="center" bordercolor="#9999FF">
    <td>仓库编号</td>
	<td>仓库名称</td>
    <td>负责人</td>
    <td>仓库电话</td>
    <td>仓库地址</td>
    <td>备注</td>
    <td>修改</td>
    <td>删除</td>
  </tr></thead>
  <tbody>
  <?php
	while($RS=mysql_fetch_array($result))
	{
		echo "<tr align='center' bordercolor='#9999FF'>";
		echo "<td>".$RS['id']."</td>\n";
		echo "<td>".$RS['name']."</td>\n";
		echo "<td>".$RS['fuzeren']."</td>\n";
		echo "<td>".$RS['phone']."</td>\n";
		echo "<td>".$RS['address']."</td>\n";
		echo "<td>".$RS['remark']."</td>\n";
		echo "<td><a href='warehouse_modify.php?id=".$RS['id']."'><img src='../../image/modify.gif' alt='' border='0' /></a></td>\n";
		echo "<td><a href=\"javascript:if(confirm('确定？')) location.href='../sql_delete_bg.php?db=warehouse&id=".$RS['id']."'\">";
		echo "<img src='../../image/delete.gif' alt='' border='0' /></a></td>\n";
		echo "</tr>";
	}
?></tbody>
</table>
</p>
<p>
  <?php
$current=$page+1;
echo "第".$current."页，共".$total."页";
echo "&nbsp;&nbsp;跳页至";
echo "<select name='pagechoose' onchange='javascript:location.href=this.value;'>";
for($i=0;$i<$total;$i++){
	$string="";
	if($i==$page) $string=" selected='selected' ";
	$url_i = "warehouse_show.php?page=".$i;
	echo "<option value='".$url_i."'".$string.">". ($i+1) ."</option>" ;
	}
echo "</select>";

if($current<$total){
	echo "<a href='warehouse_show.php?page=".$current."'>下一页</a>";
}
if($current>1){
	$pre = $current-2;
	echo "<a href='warehouse_show.php?page=".$pre."'>上一页</a>";
}   
  
?>
</p></div>
</body>
</html>
