<?php
	session_start();
	$name=$_GET[name];
	$i=0;
	include "../conn/conn.php";
    $sqlstr = "select id,name from tb_admin";
	$result = mysql_query($sqlstr,$conn);	
?>
<link href="../css/style.css" rel="stylesheet" />
<script >


function chkinput(form)
	{
	  if(form.adminname.value=="")
	   {
	     alert("请输入用户名!");
		 form.adminname.select();
		 return(false);
	   }
	  
	
	
	  if(form.pwd.value=="")
	   {
	     alert("请输入密码口令!");
		 form.pwd.select();
		 return(false);
	   }
	
	   return(true);
	}

 function Refresh() 
{ 

  var v=document.getElementsByTagName("input"); 
  for(var i=0;i<v.length;i++) 
 { 
    if(v[i].type=="text") 
    { 
      v[i].value=""; 
    } 
    if(v[i].type=="checkbox")
    {
        v[i].checked =false;  
    }
  } 
  
  
}

function chAll(name,flag)
{
 var len = document.getElementsByName(name).length;
 var check=flag;
 if(check==true)
 {
    for(var i=0; i < len; i++)
   {
      document.getElementsByName(name)[i].checked = true;
   }
 }
 else
 {
    for(var i=0; i < len; i++)
   {
      document.getElementsByName(name)[i].checked = false;
   }
  }
}
 
 </script>
<style type="text/css">
<!--
.STYLE1 {font-size: 18px}
.STYLE2 {font-size: 16px}
-->
</style>
<table width="853" border="1" cellpadding="0" cellspacing="0" class="big_td">
  <tr>
    <td width="46" height="33" background="../iages/list.jpg" id="list">&nbsp;</td>
    <td width="841" background="../images/list.jpg" id="list">添加用户</td>
  </tr>
</table>
<form name="form" method="post" action="saveadmin.php?flag=1" onSubmit="return chkinput(this)">
  <table width="800" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
    <tr>
      <td height="255" colspan="2" rowspan="4" align="center" valign="middle" scope="col"><select name="left" size="20" multiple style="width:100px;"onchange="javascript:window.open('adminsetting.php?name='+ this.value, '_self');">
          <?php
	 	while($rows = mysql_fetch_row($result)){
		   if($rows[1]==$name)
		   {
		     echo "<option value='".$rows[1]."'style='background:#FFFF00' >".$rows[1]."</option>";
		   }
		   else
		
			echo "<option value='".$rows[1]."'>".$rows[1]."</option>";		
		}
	 ?>
        </select>
      <td width="827" height="49" align="center" valign="top" scope="col"><label>用户名： <span class="STYLE1">
        <input name="adminname" type="text" class="big_td" />
        </span></label>
        <label>密码：
        <input type="password" name="pwd" />
        </label></td>
    </tr>
    <tr>
      <td height="5" align="left" valign="top" scope="col"><img src="../images/line.gif" width="600" height="4" /></td>
    </tr>
    <tr>
      <td height="10" align="center" valign="top" scope="col"><label><span class="STYLE1">权限</span><br />
      </label>
        <label><br />
        </label>
        <label><br />
      </label></td>
    </tr>
    <tr>
      <td height="158" align="center" valign="top" scope="col"><table width="600" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><label><input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        往来单位管理</label></td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        部门设置</label>        </td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        员工管理</label></td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        仓库设置</label></td>
        </tr>
        <tr>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        出入库分类</label></td>
          <td><label><input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        货品分类管理</label></td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        货品信息管理</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        计量单位管理</label></td>
        </tr>
        <tr>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        入库管理</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        出库管理</label>        </td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        库存调拨</label></td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        库存盘点</label></td>
        </tr>
        <tr>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        库存查询</label></td>
          <td>  <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        库存预警</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        入库统计</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        出库统计</label></td>
        </tr>
        <tr>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        调拨统计</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        盘点统计</label>        </td>
          <td><label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" />
        操作用户设置</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        数据备份</label></td>
        </tr>
        <tr>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        数据恢复</label></td>
          <td> <label>
        <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"/>
        查看系统操作日志</label></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="33" colspan="3" align="left" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        是否启用
        <select name="state">
          <option value="1" selected >启用</option>
          <option value="0" >停用</option>
        </select>
        <label>
        <input type="checkbox" name="choall" value="checkbox" onClick="chAll('auth[]',this.checked)" />
        全选/全不选</label></td>
    </tr>
    <tr>
      <td height="34" colspan="3" align="center" valign="middle"><input type="submit" name="Submit" value="保存" />
        <input name="button" type="button" onClick="Refresh()" value="重填" />      </td>
    </tr>
    <tr>
      <td height="67" colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
</form>
