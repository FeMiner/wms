<?php
session_start();

function w_log($act){
	$filename = "log.txt";
	if(file_exists($filename)){
		$f_open = fopen($filename,"a+");
	}
	else
	{
		$f_open = fopen($filename,"w+");
	}
		$str = $_SESSION['username'].",".date("Y-m-d H:i:s").",".$_SERVER['REMOTE_ADDR'].",".$act."\n";
		fwrite($f_open,$str);
		fclose($f_open);
}
//删除系统日志
function c_log(){
	$filename="../log.txt";
	if(file_exists($filename))
		unlink($filename);
	else
		echo "<script>alert('暂无系统日志！');history.go(-1);</script>";
}


//返回文件夹下的文件列表
function show_file(){
	$folder_name = "sql";
	$d_open = opendir($folder_name);
	$num = 0;
	while($file = readdir($d_open)){
		$filename[$num] = $file;
		$num++; 
	}
	closedir($d_open);
	return $filename;
}
//读取字段
//$conn,数据库链接
//$dataname：数据表名称
//$fieldname：要查找字段
//$n_id：数据id号
function read_field($conn,$tablename,$fieldname,$n_id){
	$sqlstr = "select ".$fieldname." from ".$tablename." where id = ".$n_id;
	$result = mysql_query($sqlstr,$conn);
	$rows = mysql_fetch_row($result);
	return $rows[0];
}
?>