<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
	include "../include.php";
	include "../database.php";

$name = $_POST["name"];
$fuzeren = $_POST["fuzeren"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$remark = $_POST["remark"];

if($name=='')//||$fuzeren==''||$phone==''||$address==''||$remark==''
	$error='提交的表单有误！';
else{
	$id = "0000";

	$query = "select * from table_warehouse where name = '$name'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(!empty($RS))
		$error='仓库名称已存在！';
	else{
		$query = "select * from table_warehouse where id = '$id'";
		$result = mysql_query($query);
		$RS = mysql_fetch_array($result);
		
		while(!empty($RS)){
			if(($id=next_value($id))!="Overflow!")
			{
				$query = "select * from table_warehouse where id = '$id'";
				$result = mysql_query($query);
				$RS = mysql_fetch_array($result);
			}
			else
			{
				$error='编号溢出！';
				break;
			}	
		}
	}
	if($error=='')
	{
		$query = "insert table_warehouse values ('$id', '$name', '$fuzeren', '$phone', '$address','$remark')";
		$result = mysql_query($query);
		$query = "create table `table_warehouse_$id` (`id` varchar(8) NOT NULL , `num` int(4) NULL , PRIMARY KEY (`id`))";
		//die($query);
		mysql_query($query);
	}
	mysql_close();
}
?>



<?php
echo '<script language="javascript">';
echo 'var url;';

if($error=='')
{
	if($result == FALSE){
		echo "alert('添加仓库失败！返回仓库添加页面！');";
		echo "var url = 'warehouse_add.php';";
	}
	else{
		echo "alert('添加仓库成功！返回仓库管理界面！\\n编号： $id\\n仓库名称： $name\\n负责人： $fuzeren\\n仓库电话： $phone\\n仓库地址： $address\\n备注： $remark');\n";
		echo "var url = 'warehouse_show.php';";
	}
}
else
{
	echo "alert('$error 返回仓库添加页面！');";
	echo "var url = 'warehouse_add.php';";
}


echo 'location.href=url;';
echo '</script>';

?>



