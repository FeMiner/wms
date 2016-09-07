<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加仓库</title>
</head>
<body>
<h3>添加仓库</h3>
<form id="warehouse_add" name="warehouse_add" method="post" action="warehouse_add_bg.php">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td align="center">仓库编号：</td>
      <td><input name="id" type="text" value="" size="6" style="background-color:#CCCCCC" readonly/></td>
    </tr>
    <tr>
      <td align="center">仓库名称：</td>
      <td><input name="name" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">负责人：</td>
      <td><input name="fuzeren" type="text" size="10" maxlength="10" /></td>
    </tr>
    <tr>
      <td align="center">仓库电话：</td>
      <td><input name="phone" type="text" size="12" maxlength="11" 
	onkeyup="value=value.replace(/[\W]/g,'')"
	onblur="if(0) document.getElementById('span1').innerHTML='电话号码错误！';else document.getElementById('span1').innerHTML=''"
	/>
        <span id="span1"></span></td>
    </tr>
    <tr>
      <td align="center">仓库地址：</td>
      <td><input name="address" type="text" value="" size="40" maxlength="50" /></td>
    </tr>
    <tr>
      <td align="center">备注：</td>
      <td><textarea name="remark" rows="3"></textarea></td>
    </tr>
    <tr>
      <td align="center"><input name="submit" type="submit" value="提交" /></td>
      <td><input name="submit" type="reset" value="重置" />
      </td>
    </tr>
  </table>
  <p>&nbsp;<a href="warehouse_show.php">返回上一页</a></p>
</form>
</body>
</html>
