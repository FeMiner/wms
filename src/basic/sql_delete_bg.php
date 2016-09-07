<?php
	include "include.php";
	include "database.php";
	
	$db = $_GET['db'];
	$id = $_GET['id'];
	
	if($id!='')
		$query = "delete from table_$db where id = '$id'";//echo $query."<br>";//
		
	$result = mysql_query($query);
	mysql_close();

	echo '<script language="javascript">';

	if($result==false)
		echo "alert('数据删除失败！');";
	else
		echo "alert('数据删除成功！');";

	echo "var url='$db/".$db."_show.php';";
	echo 'location.href=url;';
	echo '</script>';
?>
