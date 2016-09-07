<?php
     	include "../conn/conn.php";
	  $upfile=$_POST[up_file];
	if(!empty($_FILES['upfile']['name'])){
	$fileinfo = $_FILES['upfile'];
		if($fileinfo['size'] < 2000000 && $fileinfo['size'] > 0){
			//move_uploaded_file($fileinfo['tmp_name'],"system/uploads/".$fileinfo['name']);
			//move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
			move_uploaded_file($fileinfo['tmp_name'],"uploads/db_wms.sql");
			echo "上传成功";
		}else{
			echo '文件太大或未知';
		}
	}

	$mysqlstr = "mysql -uroot -phust db_wms<uploads\db_wms.sql";
	//echo $mysqlstr;
	exec($mysqlstr);
	echo "<script>alert('恢复成功');location='../desk.php'</script>";
?>