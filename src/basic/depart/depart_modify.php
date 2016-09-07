<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>部门信息修改</title>
</head>
<?php
	include "../include.php";
	include "../database.php";

	$id=$_GET["id"];
	if($id=="")
		$error="参数ID传递错误!";
	else{
		$query="select * from table_depart where id=$id";//echo $query."<br>";
		$result=mysql_query($query);
		$RS=mysql_fetch_array($result);
		if(empty($RS))
			$error="指定的部门不存在!";
		mysql_close();
	}
?>
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
<h3>部门详细信息</h3>
<form id="depart_modify" name="depart_modify" method="post" action="depart_modify_bg.php">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td align="center">部门编号：</td>
      <td><input name="id" type="text" value="<?php echo $RS['id']; ?>" size="4" maxlength="4" readonly/></td>
    </tr>
    <tr>
      <td align="center">部门名称：</td>
      <td><input name="name" type="text" value="<?php echo $RS['name']; ?>" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">部门主管：</td>
      <td><input name="major" type="text" value="<?php echo $RS['major']; ?>" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">部门电话：</td>
      <td><input name="phone" type="text" value="<?php echo $RS['phone']; ?>" size="12" maxlength="11" /></td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="Submit" value="提交" /></td>
      <td><input name="reset" type="reset" id="reset" value="恢复" /></td>
    </tr>
  </table>
  <p>&nbsp;<a href="depart_show.php">返回上一页</a></p>
</form>
<script language="javascript">
var url;

<?php
if($error!=''){
	echo "alert('$error 请返回员工信息概览页面！');";
	echo "var url = 'depart_show.php';";
	echo "location.href=url;";
}
?>


</script>
</body>
</html>
