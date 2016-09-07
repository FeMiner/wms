<?php
	session_start();
	include "../conn/conn.php";
    $sqlstr = "select id,name from tb_admin";
	$result = mysql_query($sqlstr,$conn);
	$i=0;	
?>
<link href="../css/style.css" rel="stylesheet" />
<?php
  include("../const.php");
   
  if ($authority[18]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }
?>
<script >

function chkinput(form)
	{
	  if(form.adminname.value=="")
	   {
	     alert("请输入用户名!");
		 form.adminname.select();
		 return(false);
	   }
	
	   return(true);
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
	    <td width="841" background="../images/list.jpg" id="list">操作员设置</td>
	</tr>
</table>
<form name="form" method="post" action="saveadmin.php?flag=0" onSubmit="return chkinput(this)">
<table width="1104" border="0" cellpadding="0" cellspacing="0" bgcolor="#DEEBEF">
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
      <?php
		   $sql=mysql_query("select * from tb_admin where name='".$_GET[name]."'",$conn);
		   $info=mysql_fetch_array($sql);
		   $auth=explode(",",$info[authority]);
		  
	 ?>
    <td width="827" height="49" align="left" valign="top" scope="col"><label>用户名：
        <span class="STYLE1">
        <input name="adminname" type="text" value="<?php echo $info[name];?>" class="big_td" />
        </span></label><label>密码：
        <input type="password" name="pwd" />
        <a href="addadmin.php" target="_self"><img src="../images/adduser.jpg" alt="添加用户" width="30" height="30" border="3" /></a>添加新用户        <br />
     </label></td>
  </tr>
  <tr>
    <td height="5" align="left" valign="top" scope="col"><img src="../images/line.gif" width="600" height="4" /></td>
  </tr>
  <tr>
    <td height="10" align="left" valign="top" scope="col"><label><span class="STYLE1">权限</span><br />
    </label>
      <label></label></td>
  </tr>
  <tr>
    <td height="158" align="left" valign="top" scope="col"><table width="600" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[0] == 1){ ?>checked="checked" <?php } ?>/>
          往来单位管理</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[1] == 1){ ?>checked="checked" <?php } ?>/>
          部门设置</label>
        </td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[2] == 1){ ?>checked="checked" <?php } ?>/>
          员工管理</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[3] == 1){ ?>checked="checked" <?php } ?>/>
          仓库设置</label></td>
      </tr>
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[4] == 1){ ?>checked="checked" <?php } ?>/>
          出入库分类</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[5] == 1){ ?>checked="checked" <?php } ?>/>
          货品分类管理</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[6] == 1){ ?>checked="checked" <?php } ?>/>
          货品信息管理</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[7] == 1){ ?>checked="checked" <?php } ?> />
          计量单位管理</label></td>
      </tr>
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[8] == 1){ ?>checked="checked" <?php } ?>/>
          入库管理</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[9] == 1){ ?>checked="checked" <?php } ?>/>
          出库管理</label>
        </td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[10] == 1){ ?>checked="checked" <?php } ?>/>
          库存调拨</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[11] == 1){ ?>checked="checked" <?php } ?>/>
          库存盘点</label></td>
      </tr>
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[12] == 1){ ?>checked="checked" <?php } ?>/>
          库存查询</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[13] == 1){ ?>checked="checked" <?php } ?>/>
          库存预警</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[14] == 1){ ?>checked="checked" <?php } ?>/>
          入库统计</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[15] == 1){ ?>checked="checked" <?php } ?>/>
          出库统计</label></td>
      </tr>
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[16] == 1){ ?>checked="checked" <?php } ?>/>
          调拨统计</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[17] == 1){ ?>checked="checked" <?php } ?>/>
          盘点统计</label>
        </td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>" <?php if($auth[18] == 1){ ?>checked="checked" <?php } ?>/>
          操作用户设置</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[19] == 1){ ?>checked="checked" <?php } ?>/>
          数据备份</label></td>
      </tr>
      <tr>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[20] == 1){ ?>checked="checked" <?php } ?>/>
          数据恢复</label></td>
        <td><label>
          <input name="auth[]" type="checkbox" class="big_td" value="<?php echo $i++;?>"<?php if($auth[21] == 1){ ?>checked="checked" <?php } ?>/>
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
         <option value="1"  <?php if($info[state]==1 ){ ?>selected="selected"<?php } ?>>启用</option>
         <option value="0" <?php if($info[state]==0 ){?>selected="selected"<?php } ?>>停用</option>
		 <option value="2" >删除</option>
      </select>
      <label>
      <input type="checkbox" name="choall" value="checkbox" onclick="chAll('auth[]',this.checked)" />
      全选/全不选 </label></td>
  </tr>
  <tr>
    <td height="34" colspan="3" align="center" valign="middle">
      <input type="submit" name="Submit" value="提交" />
      <input name="button" type="button" onclick="javascript:window.open('adminsetting.php?name=<?php echo $name;?>', '_self')" value="取消" />   </td>
  </tr>
  <tr>
    <td height="67" colspan="3" align="center" valign="middle">&nbsp;</td>
  </tr>
</table>
</form>
