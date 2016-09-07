<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php
	include "../include.php";
	include "../database.php";

$id = "0000";
$name = $_POST["name"];

if($id==''||$name=='')//||$major==''||$phone==''
	$error='提交的表单有误！';
else{	
	$query = "select * from table_measureunit where name = '$name'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(!empty($RS))
		$error="该部门已存在！";
	
	$query = "select * from table_measureunit where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	while(!empty($RS)){
		if(($id=next_value($id))!="Overflow!")
		{
			$query = "select * from table_measureunit where id = '$id'";
			$result = mysql_query($query);
			$RS = mysql_fetch_array($result);
		}
		else
		{
			$error='编号溢出！';
			break;
		}
	}	
	if($error=='')
	{
		$query = "insert table_measureunit values ('$id', '$name')";
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
		echo "alert('添加失败！');";
		echo "var url = 'measureunit_add.php';";
	}
	else{
		echo "alert('添加成功！\\n编号： $id\\n单位名称： $name');\n";
		echo "var url = 'measureunit_show.php';";
	}
}
else
{
	echo "alert('$error ');";
	echo "var url = 'measureunit_add.php';";
}
?>
location.href=url;
</script>