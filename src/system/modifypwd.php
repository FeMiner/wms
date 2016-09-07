<?php
	session_start();
	include "../conn/conn.php";
	//if($_SESSION[username]="") then
?>
<html>
<head>
<title>修改密码</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../style/style.css" rel="stylesheet" type="text/css">
<style>
body {
	background-color:#FFFFFF;
}
</style>
<script language="javascript">
function check()
{
if (document.form1.pwd_new.value=="")
{
alert("请输入新密码！");
document.form1.pwd_new.focus();
return false;
}
if (document.form1.pwd_new.value!=document.form1.pwd_new2.value)
{
alert("两次密码输入不一致！");
return false;
}
}
</script>
</HEAD>

<BODY>
<form name="form1" method="post" action="savepwd.php" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#C4D8ED">
<tr>
<td><img src="../images/r_1.gif" alt="" /></td>
<td width="100%" background="../images/r_0.gif">
  <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td>&nbsp;修改密码</td>
	  <td align="right">&nbsp;</td>
    </tr>
  </table>
</td>
<td><img src="../images/r_2.gif" alt="" /></td>
</tr>
<tr>
<td></td>
<td>
<table align="center" cellpadding="4" cellspacing="1" class="toptable grid" border="1">
      <tr>
        <td width="25%" height="30" align="right">原密码：</td>
        <td width="75%" class="category"><input type="text" name="pwd_old" style="width:200px"></td>
      </tr>
      <tr>
        <td align="right" height="30">新密码：</td>
        <td class="category"><input type="text" name="pwd_new" style="width:200px"></td>
      </tr>
      <tr>
        <td align="right" height="30">确认新密码：</td>
        <td class="category"><input type="text" name="pwd_new2" style="width:200px"></td>
      </tr>	  	  
      <tr>
	    <td height="30">&nbsp;</td>
        <td class="category">
		  <input type="submit" value=" 确认修改 " onClick="return check()" class="button">&nbsp;&nbsp;&nbsp;&nbsp;
		  <input type="reset" value=" 重置 " class="button">
		  </td>
      </tr>	    
</table>
</td>
<td></td>
</tr>
<tr>
<td><img src="../images/r_4.gif" alt="" /></td>
<td></td>
<td><img src="../images/r_3.gif" alt="" /></td>
</tr>
</table>
</form>
</body>
</html>