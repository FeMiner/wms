<?php
	//include "../inc/chec.php";
	include "../inc/func.php";
	$filename = show_file();
	for($num = 2;$num < count($filename);$num++){
		unlink("sql/".$filename[$num]);
	}
	echo "<script>alert('É¾³ý³É¹¦£¡');location='databackup.php'</script>";
?>