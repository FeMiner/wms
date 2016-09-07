<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加部门</title>
</head>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
body {
	width:800px;
	font-size:14px
}
thead {
	color: #330066
}
</style>
<body>
<h3>添加部门</h3>
<p>注有*的项目不能为空！</p>
<form id="depart_add" name="depart_add" method="post" action="depart_add_bg.php">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td align="center">*部门名称：</td>
      <td>&nbsp;
        <input name="name" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">*部门主管：</td>
      <td>&nbsp;
        <input name="major" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">*部门电话：</td>
      <td>&nbsp;
        <input name="phone" type="text" size="11" maxlength="11" /></td>
    </tr>
    <tr>
      <td align="center">&nbsp;
      <input name="submit" type="submit" value="提交" /></td>
      <td>&nbsp;
        <input name="submit" type="reset" value="重置" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;<a href="depart_show.php">返回上一页</a></p>
</body>
</html>
