<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php
	include "../include.php";
	include "../database.php";

$id = "0000";
$name = $_POST["name"];
$major = $_POST["major"];
$phone = $_POST["phone"];

if($id==''||$name=='')
	$error='提交的表单有误！';
else{
	$query = "select * from table_depart where name = '$name'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(!empty($RS))
		$error="该部门已存在！";
	
	$query = "select * from table_depart where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	while(!empty($RS)){
		if(($id=next_value($id))!="Overflow!"){
			$query = "select * from table_depart where id = '$id'";
			$result = mysql_query($query);
			$RS = mysql_fetch_array($result);
		}
		else{
			$error='编号溢出！';
			break;
		}
	}	
	if($error=='')
	{
		$query = "insert table_depart values ('$id', '$name', '$major', '$phone')";
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
		echo "alert('添加部门失败！返回部门添加页面！');";
		echo "var url = 'depart_add.php';";
	}
	else{
		echo "alert('添加部门成功！返回部门管理界面！\\n部门编号： $id\\n部门名称： $name\\n部门主管： $major\\n部门电话： $phonet');\n";
		echo "var url = 'depart_show.php';";
	}
}
else
{
	echo "alert('$error 返回部门添加页面！');";
	echo "var url = 'depart_add.php';";
}
?>
location.href=url;
</script>