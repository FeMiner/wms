<?php
include "../inc/func.php";
?>
<?php
  include("../const.php");
   
  if ($authority[20]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }
?>
<script src="../js/admin_js.js"></script>
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
	    <td width="841" background="../images/list.jpg" id="list">数据恢复</td>
	</tr>
</table>

<table width="500" height="140" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td height="50" colspan="3" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#669933">&nbsp;</td>
    <td align="center" bgcolor="#669966"><h2>数据恢复将覆盖现有数据，请谨慎操作</h2></td>
    <td bordercolor="#F0F0F0" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><form name="rebak" id="rebak" method="post" action="datarec.php">
<input id="butt" type="submit" value="恢复备份" onclick="return re_bak();"/>&nbsp;
<select name="r_name" style="width:190;">
		<?php
			$filename = show_file();
			for($num = 2;$num<count($filename);$num++){
		?>
			<option value="<?php echo $filename[$num]; ?>"><?php echo $filename[$num]; ?></option>
		<?php
			}
		?>
		</select>
</form>   </td>
  </tr>
  <tr>
    <td colspan="3" align="left" valign="bottom"><form action="datarec1.php" method="post" enctype="multipart/form-data" name="form">从本地恢复
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <input type="file" name="upfile" class="inputcss" size="30" />
	<input type="submit" name="submit" value="上传" />
</form>
</td>
  </tr>
  <tr>
    <td colspan="3" align="right"><a href="../main.php"><img src="../images/tuichu.jpg" width="62" height="36" border="0" /></a></td>
  </tr>
</table>
