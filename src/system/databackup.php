<?php
  include("../const.php");
   
  if ($authority[19]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }
?><script src="../js/admin_js.js"></script>
<link href="../css/style.css" rel="stylesheet" />

<style type="text/css">
<!--
.STYLE1 {font-size: 18px}
.STYLE2 {font-size: 16px}
-->
</style>

<table width="853" border="1" align="center" cellpadding="0" cellspacing="0" class="big_td">
	<tr>
		<td width="46" height="33" background="../iages/list.jpg" id="list">&nbsp;</td>
	    <td width="841" background="../images/list.jpg" id="list">数据备份</td>
	</tr>
</table>

<table width="500" border="2" align="center" cellpadding="0" cellspacing="15" bordercolor="#CCCCCC">
  <tr>
    <td bgcolor="#669933">&nbsp;</td>
    <td align="center" bgcolor="#669966"><h2>为保证数据安全，请定期备份数据</h2></td>
    <td bordercolor="#F0F0F0" bgcolor="#FFFFFF"><a href="del_stock_chk.php" onclick="return del_bak();">删除旧备份</a></td>
  </tr>
  <tr>
    <td colspan="3"><form action="databak.php" method="post" enctype="multipart/form-data" name="form" id="form">
      <label>
      <input type="submit" name="Submit" value="备份" />
      </label>
        <label></label>
        <label>
        <input type="text" name="filename" value="db_wms_<?php echo date("Y_m_d_H_i_s"); ?>.sql" />
        </label>
        <label></label>
        <label>
        <input type="checkbox" name="flag" value="1" />
        保存到本地</label>
        <p>
          <label></label>
</p>
    </form>      </td>
  </tr>
  <tr>
    <td colspan="3" align="right"><a href="../main.php"><img src="../images/tuichu.jpg" width="62" height="36" border="0" /></a></td>
  </tr>
</table>
