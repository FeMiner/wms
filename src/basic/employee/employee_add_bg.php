<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
	include "../include.php";
	include "../database.php";

$name = $_POST["name"];
$gender = $_POST["gender"];
$job = $_POST["job"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$depart = $_POST["depart"];

if($name==''||$gender==''||$job==''||$phone==''||$address==''||$depart=='')
	$error='提交的表单有误！';
else
{
	$date = date("ymd");
	$id = $date."00";
	
	$query = "select * from table_employee where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	while(!empty($RS)){
		if(($id=next_value($id))!="Overflow!"){
			$query = "select * from table_employee where id = '$id'";
			$result = mysql_query($query);
			$RS = mysql_fetch_array($result);
		}
		else{
			$error='编号溢出！';
			break;
		}	
	}
	if($error==''){
		$query = "insert table_employee values ('$id', '$name', '$gender', '$job', '$phone', '$address','$depart')";
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
		echo "alert('添加员工失败！返回员工添加页面！');";
		echo "var url = 'employee_add.php';";
	}
	else{
		echo "alert('添加员工成功！返回员工管理界面！\\n编号： $id\\n姓名： $name\\n性别： $gender\\n职位： $job\\n手机： $phone\\n住址： $address\\n所属部门： $depart');\n";
		echo "var url = 'employee_show.php';";
	}
}
else
{
	echo "alert('$error 返回员工添加页面！');";
	echo "var url = 'employee_add.php';";
}
?>

location.href=url;
</script>





