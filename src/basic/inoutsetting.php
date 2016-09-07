<?php
  include("../const.php");
  include("../conn/conn.php");

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>出入库类别设置</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.STYLE2 {color: #FF0000}
.STYLE3 {color: #009900; }
-->
</style>
</head>
<?php

  if ($authority[4]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
	   $sql=mysql_query("select count(*) as total from tb_inout ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0){
	     echo "暂无分类!";
	   }
	   else
	    {
?>
<form name="form1" method="post" action="deleteinout.php">
  <p>&nbsp;</p>
  <table width="715" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="715" height="75" bgcolor="#666666"><table width="715" height="86" border="0" cellpadding="0" cellspacing="1">
      
	  <tr bgcolor="#FFCF60">
        <td height="20" colspan="6" bgcolor="#0066FF"><div align="center" class="style1">
          <h1>货品出库/入库类别设置</h1>
        </div></td>
      </tr>
      <tr>
        <td width="59" height="28" bgcolor="#FFFFFF"><div align="center" class="STYLE2">复选</div></td>
        <td width="102" bgcolor="#FFFFFF"><div align="center" class="STYLE2">序号</div></td>
        <td width="86" bgcolor="#FFFFFF"><div align="center" class="STYLE2">分类</div></td>
        <td width="128" bgcolor="#FFFFFF"><div align="center" class="STYLE2">名称</div></td>
        <td width="235" bgcolor="#FFFFFF"><div align="center" class="STYLE2">是否参与库存成本核算</div>          <div align="center" class="STYLE2"></div>          
          <div align="center" class="STYLE2"></div></td>
        <td width="98" bgcolor="#FFFFFF"><div align="center" class="STYLE2">操作</div></td>
      </tr>
	  <?php
	  
		  $sql1=mysql_query("select * from tb_inout where type='".出库."' order by id asc",$conn);
		  $cnt=1;
		   while($info1=mysql_fetch_array($sql1))
		    {
	  ?>
      <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>>
        </div></td>
        <td height="25" bgcolor="#FFFFFF">
          
          <div align="center" class="STYLE3"><?php echo $cnt++;?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php echo $info1[type];?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php echo $info1[name];?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php if($info1[cost]==0) {echo "否";}else {echo "是";}?></div>          <div align="center" class="STYLE3"></div>          </td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE2"><a href="editinout.php?id=<?php echo $info1[id];?>">修改</a></div></td>
      </tr>
	 <?php
	    }
      ?>
	  
	  <?php

		  $sql2=mysql_query("select * from tb_inout where type='".入库."' order by id asc",$conn);
		   while($info2=mysql_fetch_array($sql2))
		    {
	  ?>
	  
	  <tr>
        <td height="25" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="<?php echo $info2[id];?>" value=<?php echo $info2[id];?>>
        </div></td>
        <td height="25" bgcolor="#FFFFFF">
          
          <div align="center" class="STYLE3"><?php echo $cnt++;?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php echo $info2[type];?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php echo $info2[name];?></div></td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE3"><?php if($info2[cost]==0) {echo "否";}else {echo "是";}?></div>          <div align="center" class="STYLE3"></div>          </td>
        <td height="25" bgcolor="#FFFFFF"><div align="center" class="STYLE2"><a href="editinout.php?id=<?php echo $info2[id];?>">修改</a></div></td>
      </tr>
 <?php
	    }
      ?>	  
	  
    </table></td>
  </tr>
</table>
<table width="710" height="78" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="355">
	  <div align="left"><input name="submit" type="submit" class="btn_2k3" id="submit" value="删除"/>
	  &nbsp;<input type="reset" value="重选" class="btn_2k3"/>
	  <label></label>
	  </div>	  
	  <div align="right"></div></td>
    <td width="355" align="center"><input name="addnew" type="button" value="新增"onClick="javascript:window.open('newinout.php','_self')" /></td>
  </tr>
</table>
</form>
<?php
	    }
      ?>
</body>
</html>

