<?php
//权限验证——
include("../../const.php");
if ($authority[7]==0){  
	echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
	exit;
}
//权限验证——

	include "../include.php";
	include "../database.php";
	
	$query="select * from table_measureunit";//echo $query."<br>";
	$result = mysql_query($query);

	mysql_close();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>计量单位管理</title>
</head>
<script language="javascript">
//删除某个单位————
function removeUnit(){
	var x = document.getElementById("unit_list");
	if(x.selectedIndex != -1){
		var url = "../sql_delete_bg.php?db=measureunit&id="+x.options[x.selectedIndex].value;
		if(confirm("确认删除？")==true)
		location.href = url;
	}
	//alert("deleteOptionLeft() runing!");	
}
//删除某个单位————
//检查单位名称是否为空或在列表中是否存在，避免无谓的流量————
function checkForm(){
	var x = document.getElementById("unit_list");
	var y = document.getElementById("name");
	if(y.value == ''){
		alert("计量单位名称不为空！");
		return false;
	}
	for(var i=0;i<x.length;i++)
		if(y.value == x.options[i].text){
			alert("该计量单位已存在！");
			return false;
		}
	return true;
	//alert("deleteOptionLeft() runing!");	
}
//检查单位名称是否为空或在列表中是否存在，避免无谓的流量————
</script>
<body style="width:800px">
<h3>计量单位/量词管理</h3>
<form id="unitForm" name="unitForm" method="post" action="measureunit_add_bg.php" onsubmit="return checkForm()">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#CC99FF">
    <tr valign="top" align="left">
      <td>现有单位：</td>
      <td>
        <select id="unit_list" name="unit_list" size="10" ondblclick="removeUnit()">
          <?php while($RS=mysql_fetch_array($result)) echo "<option value='$RS[id]'>$RS[name]</option>"; ?>
        </select></td>
      <td>&nbsp;
        <input id="name" name="name" type="text" size="5" />
        <input name="add" type="submit" value="添加" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="remove" type="button" id="remove" value="删除" onClick="removeUnit()"/></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p><a href="">返回上一页</a></p>
</body>
</html>
