<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
	include "../include.php";
	include "../database.php";

$string = $_POST[hidden];

if($string == "")
	$error='提交的表单有误！';
else
{
	$str_array = explode("|",$string,3);
	$id = $str_array[0];
	$name = $str_array[1];
	$lowerclass = "|".$str_array[2];
	
	$query = "select * from table_itemclassify where id = '$id'";//echo $query."<br>";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	if(empty($RS))
		$error = "ID错误，需修改的目标不存在！";	
	else{
		$query = "update table_itemclassify set name='$name', lowerclass='$lowerclass' where id = '$id'";
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
		echo "alert('修改失败!！');";
		echo "var url = 'itemclassify_show.php';";
	}
	else{
		echo "alert('修改成功！\\n编号： $id\\n分类名称： $name\\n');\n";
		echo "var url = 'itemclassify_show.php';";
	}
}
else{
	echo "alert('$error');";
	echo "var url = 'itemclassify_show.php';";
}
?>

location.href=url;
</script>
