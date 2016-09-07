<?php
	session_start();
	//include "../inc/chec.php";
?>
<script src="../js/admin_js.js"></script>
<link href="../css/style.css" rel="stylesheet">
<?php
  include("../const.php");
   
  if ($authority[21]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }
?>
</head>
<body>
<table width="765" height="450" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #9CBED6; margin-top:15px;">
<tr><td align="center" valign="middle">
<table width="341" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="3" height="30" align="center" valign="middle"><a href="del_slog_chk.php" onClick="return del_chk();">清除日志</a></td>
	</tr>
	<tr>
		<td width="48" height="25" align="center">登录账号</td>
		<td width="156" height="25" align="center">登录时间</td>
		<td width="137" height="25" align="center">登录IP</td>
		</tr>
<?php
	$filename =  "../log.txt";
	
	if($f_open = fopen($filename,"r"))
	{
		while($str = fgets($f_open,255)){
			$chr = split(",",$str);
			echo "<tr>";
			for($i = 0; $i < count($chr); $i++){
				echo "<td align='center' height='25'>".$chr[$i]."</td>";
			}
			echo "</tr>";
		}
		fclose($f_open);
	}
	else
		echo "<script>alert('还没有日志文件！');history.go(-1);</script>";
?>
</table>
</td></tr></table>
</body>
</html>
