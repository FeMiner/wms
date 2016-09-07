<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>添加往来单位</title>
</head>
<script language="javascript">
function checkform(){
	//if(company_add.name.value==''){
		//alert("Check Form！");
		return true;
	//}
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
<h3>添加往来单位</h3>
<p>注有*的项目不能为空！ </p>
<form id="company_add" name="company_add" method="post" action="company_add_bg.php" onsubmit=" return checkform()">
  <table border="1" cellpadding="5" cellspacing="0" bordercolor="#9999FF">
    <tr>
      <td bordercolor="#990099"><table width="100%">
          <tr>
            <td width="100" align="center">*编号：</td>
            <td><input name="id" type="text" size="10" maxlength="10" style=" background-color:#CCCCCC" readonly/></td>
          </tr>
          <tr>
            <td width="100" align="center">*单位名称：</td>
            <td><input name="name" type="text" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td width="100" align="center">*类型：</td>
            <td><select name="type">
                <option value="经销商">经销商</option>
                <option value="供应商">供应商</option>
              </select>
            </td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%">
          <tr>
            <td width="100" align="center">*联系人：</td>
            <td><input name="contact" type="text" size="10" maxlength="10"/></td>
          </tr>
          <tr>
            <td width="100" align="center">*联系电话：</td>
            <td><input name="phone" type="text" size="10" maxlength="10"/></td>
          </tr>
          <tr>
            <td width="100" align="center">传真：</td>
            <td><input name="fax" type="text" size="10" maxlength="10"/></td>
          </tr>
          <tr>
            <td width="100" align="center">Email：</td>
            <td><input name="email" type="text" size="10" maxlength="10"/></td>
          </tr>
        </table></td>
      <td><table width="100%">
          <tr>
            <td width="100" align="center">*开户银行：</td>
            <td><input name="bank" type="text" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td width="100" align="center">*银行账户：</td>
            <td><input name="bankaccount" type="text" size="10" maxlength="10" />
          </tr>
          <tr>
            <td width="100" align="center">*税号：</td>
            <td><input name="tariff" type="text" size="10" maxlength="10" onkeyup="value=value.replace(/[\W]/g,'')"/></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%">
          <tr>
            <td width="100" align="center">*区域:</td>
            <td><select name="area">
                <option value="西北">西北</option>
                <option value="华北">东北</option>
                <option value="东北">华北</option>
                <option value="华中">华中</option>
                <option value="华南">华南</option>
                <option value="西南">西南</option>
                <option value="东南">东南</option>
              </select>
            </td>
          </tr>
          <tr>
            <td width="100" align="center">*省份：</td>
            <td><input name="province" type="text" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td width="100" align="center">*地址：</td>
            <td><input name="address" type="text" size="10" maxlength="10" /></td>
          </tr>
          <tr>
            <td width="100" align="center">*邮编：</td>
            <td><input name="zipcode" type="text" size="10" maxlength="10" /></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td align="center"><input name="submit" type="submit" value="提交" /></td>
      <td><input name="submit" type="reset" value="重置" />
      </td>
    </tr>
  </table>
</form>
<p><a href="company_show.php">返回上一页</a></p>
</body>
</html>
