<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php
	include "../include.php";
	include "../database.php";

$id = $_POST["id"];
$name = $_POST["name"];
$major = $_POST["major"];
$phone = $_POST["phone"];


if($id==''||$name=='')//||$major==''||$phone==''
	$error='提交的表单有误！';
else{
	$query = "select * from table_depart where id = '$id'";//echo $query."<br>";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(empty($RS))
		$error = "ID错误，需修改的目标不存在！";	
	else{
		$query = "update table_depart set name='$name',major='$major',phone='$phone' where id = '$id'";//,major='$major',phone='$phone'
		$result = mysql_query($query);
	}
	mysql_close();
}
?>

<script language="javascript">
var url;

<?php
if($error==''){
	if($result == FALSE){
		echo "alert('更新部门信息失败!！返回部门信息修改页面！');";
		echo "var url = 'depart_modify.php?id=".$id."';";
	}
	else{
		echo "alert('更新部门信息成功！返回部门管理界面！\\n部门编号： $id\\n部门名称： $name\\n部门主管： $major\\n联系电话： $phone');\n";
		echo "var url = 'depart_show.php';";
	}
}
else{
	echo "alert('$error 返回部门信息修改页面！');";
	echo "var url = 'depart_modify.php?id=".$id."';";
}
?>

location.href=url;
</script>
