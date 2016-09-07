<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
	include "../include.php";
	include "../database.php";
	
$id = $_POST["id"];
$name = $_POST["name"];
$fuzeren = $_POST["fuzeren"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$remark = $_POST["remark"];

if($name=='')//||$fuzeren==''||$phone==''||$address==''||$remark==''
	$error='提交的表单有误！';
else
{	
	$query = "select * from table_warehouse where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(empty($RS))
		$error='ID错误，需修改的目标不存在！';
	else{
		$query = "select * from table_warehouse where name = '$name'";
		$result = mysql_query($query);
		$RS = mysql_fetch_array($result);
		if(!empty($RS)&&($RS['name']!=$name))
			$error='仓库名称重复！';
	}
	
	if($error=='')
	{
		$query = "update table_warehouse set name='$name',fuzeren='$fuzeren',phone='$phone',address='$address',remark='$remark' where id = '$id'";
		$result = mysql_query($query);
	}
	mysql_close();
}
?>

<script language="javascript">
var url;

<?php
if($error=='')
{
	if($result == FALSE){
		echo "alert('修改仓库信息失败！返回仓库修改页面！');";
		echo "var url = 'warehouse_modify.php?id=".$id."';";
	}
	else{
		echo "alert('修改仓库信息成功！返回仓库管理界面！\\n编号： $id\\n仓库名称： $name\\n负责人： $fuzeren\\n仓库电话： $phone\\n仓库地址： $address\\n备注： $remark');\n";
		echo "var url = 'warehouse_show.php';";
	}
}
else
{
	echo "alert('$error 返回仓库添加页面！');";
	echo "var url = 'warehouse_modify.php?id=".$id."';";
}
?>

location.href=url;
</script>





