<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>仓库信息修改</title>
</head>
<?php
	include "../include.php";
	include "../database.php";
	
	$id=$_GET["id"];
	if($id=="")die("参数传递错误");
	
	$query="select * from table_warehouse where id=$id";//echo $query."<br>";
	$result=mysql_query($query);
	$RS=mysql_fetch_array($result);
	if(empty($RS))
		$error="指定的目标不存在!";
	mysql_close();
?>
<body>
<h3>仓库详细信息</h3>
<form id="warehouse_modify" name="warehouse_modify" method="post" action="warehouse_modify_bg.php">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td align="center">仓库编号：</td>
      <td><input name="id" type="text" value="<?php echo $RS['id']; ?>" size="6" style="background-color:#CCCCCC" readonly/></td>
    </tr>
	<tr>
      <td align="center">仓库名称：</td>
      <td><input name="name" type="text" value="<?php echo $RS['name']; ?>" size="6" /></td>
    </tr>
    <tr>
      <td align="center">负责人：</td>
      <td><input name="fuzeren" type="text" value="<?php echo $RS['fuzeren']; ?>" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">仓库电话：</td>
      <td><input name="phone" type="text" value="<?php echo $RS['phone']; ?>" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">仓库地址：</td>
      <td><input name="address" type="text" value="<?php echo $RS['address']; ?>" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="center">备注：</td>
      <td><input name="remark" type="text" value="<?php echo $RS['remark']; ?>" size="30" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="Submit" value="提交" /></td>
      <td><input name="reset" type="reset" id="reset" value="恢复" /></td>
    </tr>
  </table>
  <p>&nbsp;<a href="warehouse_show.php">返回上一页</a></p>
</form>
<script language="javascript">
var url;

<?php
if($error!=''){
	echo "alert('$error 请返回员工信息概览页面！');";
	echo "var url = 'warehouse_show.php';";
	echo "location.href=url;";
}
?>
</script>
</body>
</html>
