<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php
//include "../include.php";
include "../database.php";

$id = $_POST["id"];
$name = $_POST["name"];
$type = $_POST["type"];
$contact = $_POST["contact"];
$phone = $_POST["phone"];
$fax = $_POST["fax"];
$email = $_POST["email"];
$bank = $_POST["bank"];
$bankaccount = $_POST["bankaccount"];
$tariff = $_POST["tariff"];
$area = $_POST["area"];
$province = $_POST["province"];
$address = $_POST["adress"];
$zipcode = $_POST["zipcode"];

if($id==''||$name=='')//||$gender==''||$job==''||$phone==''||$address==''||$depart==''
	$error='提交的表单有误！';
else
{
//	$con = mysql_connect("localhost","root","1234") or die("不能连接到Mysql Server");
//	mysql_select_db("db_wms", $con) or die("数据库选择失败");
//	mysql_query("set names gb2312");
	
	$query = "select * from table_company where id = '$id'";//echo $query."<br>";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(empty($RS))
		$error = "ID错误，需修改的目标不存在！";	
	else{
		$query = "update table_company set name='$name',type='$type',contact='$contact',phone='$phone',fax='$fax',email='$email',bank='$bank',bankaccount='$bankaccount',tariff='$tariff',area='$area',province='$province',address='$address',zipcode='$zipcode' where id = '$id'";
		//echo $query;die();
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
		echo "alert('更新信息失败!！返回信息修改页面！');";
		echo "var url = 'company_modify.php?id=".$id."';";
	}
	else{
		echo "alert('更新信息成功！返回管理界面！\\n编号： $id\\n名称： $name');\n";
		echo "var url = 'company_show.php';";
	}
}
else{
	echo "alert('$error 返回员工信息修改页面！');";
	echo "var url = 'company_modify.php?id=".$id."';";
}
?>

location.href=url;
</script>
