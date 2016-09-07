<?php
	include "../include.php";
	include "../database.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加员工</title>
</head>
<script language="javascript">
function checkForm(){
	if(document.getElementById('name').value==''){
		alert("姓名不能为空！");
		document.getElementById('name').focus();
		return false;
	}
	return true;
}
</script>
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
<h3>添加员工</h3>
<p>注有*的项目不能为空！ </p>
<form id="employee_add" name="employee_add" method="post" action="employee_add_bg.php" onsubmit=" return checkForm()">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td align="center">*姓名：</td>
      <td><input id="name" name="name" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">*性别：</td>
      <td><input name="gender" type="radio" value="男" checked="checked" />
        男
        <input name="gender" type="radio" value="女" />
        女</td>
    </tr>
    <tr>
      <td align="center">*职位：</td>
      <td><input name="job" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">*部门：</td>
      <td><select name="depart">
          <?php 
			$query = "select name from table_depart";
			$result = mysql_query($query);
			
			$i = 0;
			while($RS = mysql_fetch_array($result)){
				echo "<option value='".$RS['name']."'>".$RS['name']."</option>";	
				$i++;	
			}
			if($i == 0)
				die("没有部门信息，请添加部门后再添加员工");	
		  ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="center">*手机：</td>
      <td><input name="phone" type="text" size="12" maxlength="11" 
		onkeyup="value=value.replace(/[^\d]/g,'')"
		onblur="if(value.length!=11) document.getElementById('span1').innerHTML='手机号码错误！';else document.getElementById('span1').innerHTML=''"
		/>
        <span id="span1"></span></td>
    </tr>
    <tr>
      <td align="center">*住址：</td>
      <td><input name="address" type="text" size="40" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="center"><input name="submit" type="submit" value="提交" />
      </td>
      <td><input name="submit" type="reset" value="重置" />
      </td>
    </tr>
  </table>
  <p><a href="employee_show.php">返回上一页</a></p>
</form>
</body>
</html>
