<?php 
include "../conn/conn.php";

$flag=$_POST[flag];
$filename =$_POST[filename];

$path = "sql/" . $filename;

//$filehandle = fopen($path, "w");


	$mysqlstr = "mysqldump -uroot -phust db_wms >sql/".$_POST[filename];
	//$mysqlstr = "mysqldump -uroot -phust db_wms >D:/AppServ/www/wms/system/sql/".$_POST[filename];

	exec($mysqlstr);	
	
	
	if(!empty($path) and !is_null($path) and ($flag==1)){
		$filename=basename($path);
		$file=fopen($path,"r");
		header("Content-type:application/octet-stream");
		header("Accept-ranges:bytes");
		header("Accept-length:".filesize($path));
		header("Content-Disposition:attachment;filename=".$filename);
		echo fread($file,filesize($path));
		fclose($file);
		exit;
	} 
	echo "<script>alert('数据备份成功!');window.location='../desk.php';</script>";
?>
