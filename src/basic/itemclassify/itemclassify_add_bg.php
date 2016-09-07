<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<?php
	include "../include.php";
	include "../database.php";

$id = "0000";
$name = $_POST["name"];
if($name == '')
	$name = $_GET["name"];
$lowerclass = $_POST["lowerclass"];

if($id==''||$name=='')//||$contact==''||$phone==''||$fax==''||...
	$error='提交的表单有误！';
else{	
	$query = "select * from table_itemclassify where name = '$name'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(!empty($RS))
		$error="该名称已存在！";
	
	$query = "select * from table_itemclassify where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	while(!empty($RS)){
		if(($id=next_value($id))!="Overflow!")
		{
			$query = "select * from table_itemclassify where id = '$id'";
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
		$query = "insert table_itemclassify values ('$id', '$name', '$lowerclass')";
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
		echo "var url = 'itemclassify_show.php';";
	}
	else{
		echo "alert('添加成功！\\n编号： $id\\n分类名称： $name\\n');\n";
		echo "var url = 'itemclassify_show.php';";
	}
}
else
{
	echo "alert('$error ');";
	echo "var url = 'itemclassify_show.php';";
}
?>
location.href=url;
</script>