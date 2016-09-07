<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
	include "../include.php";
	include "../database.php";

$id = $_POST["id"];
$name = $_POST["name"];
$gender = $_POST["gender"];
$job = $_POST["job"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$depart = $_POST["depart"];

if($id==''||$name==''||$gender==''||$job==''||$phone==''||$address==''||$depart=='')
	$error='提交的表单有误！';
else{	
	$query = "select * from table_employee where id = '$id'";//echo $query."<br>";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(empty($RS))
		$error = "ID错误，需修改的目标不存在！";	
	else{
		$query = "update table_employee set name='$name',gender='$gender',job='$job',phone='$phone',address='$address',depart='$depart' where id = '$id'";
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
		echo "alert('更新员工信息失败!！返回员工信息修改页面！');";
		echo "var url = 'employee_modify.php?id=".$id."';";
	}
	else{
		echo "alert('更新员工信息成功！返回员工管理界面！\\n编号： $id\\n姓名： $name\\n性别： $gender\\n职位： $job\\n联系电话： $phone\\n住址： $address\\n所属部门： $depart');\n";
		echo "var url = 'employee_show.php';";
	}
}
else{
	echo "alert('$error 返回员工信息修改页面！');";
	echo "var url = 'employee_modify.php?id=".$id."';";
}
?>

location.href=url;
</script>
