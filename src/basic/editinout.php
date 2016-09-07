<?php
  include("../conn/conn.php");
   $id=$_GET[id];
   $sql=mysql_query("select * from tb_inout where id='".$_GET[id]."'",$conn);
   $info=mysql_fetch_array($sql);
		  
?>
<title>添加出/入库类别</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style5 {
	color: #000000;
	font-weight: bold;
}
.style6 {color: #000000}
.style7 {color: #990000}
.style1 {color: #FFFFFF}
.STYLE9 {color: #FFFFFF; font-size: 18px; }
.STYLE10 {font-size: 10px}
-->
</style>
<script language="javascript">
function showhide(value){
 var flag=value;;
 if (flag=="入库"){
  content.style.display="";
 }else{
  content.style.display="none";
 }
}//欢迎来到站长特效网，我们的网址是www.zzjs.net，很好记，zz站长，js就是js特效，本站收集大 量高质量js代码，还有许多广告代码下载。
</script> 
<body topmargin="0" leftmargin="0" bottommargin="0" class="scrollbar">
  
<table width="600" border="1" align="center" cellpadding="0" cellspacing="30" bordercolor="#33FFCC">
  <tr>
    <td height="20" align="center" bgcolor="#3399FF"><span class="STYLE9">货品出库/入库类别设置</span>     -编辑类别</td>
  </tr>
  <tr>
    <td align="center"><form name="form1" method="post" action="savenewinout.php?id=<?php echo $info[id];?>">
      <label>类别
      <select name="type" onChange="showhide(this.value);">
        <option value="入库" <?php if($info[type]==入库){ ?>selected="selected"<?php } ?>>入库</option>
        <option value="出库"<?php if($info[type]==出库){ ?>selected="selected"<?php } ?>>出库</option>
      </select>
      </label>
        <label>名称
        <input type="text" name="name"value="<?php echo $info[name];?>" readOnly="true"/>
        </label>
        <p>
		<div id="content">
          <label>是否参与成本核算
          <select name="cost">
            <option value="1"<?php if($info[cost]==1){ ?>selected="selected"<?php } ?>>是</option>
            <option value="0" <?php if($info[cost]==0){ ?>selected="selected"<?php } ?>>否</option>
          </select>
          </label>
		 </div>
        </p>
        <p>
          <label>
          <input type="submit" name="Submit" value="保存"> 
          </label>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label>
          <input type="button" name="button"onClick="javascript:window.open('inoutsetting.php','_self')" value="退出">
          </label>
        </p>
    </form>
    </td>
  </tr>
</table>
</body>
</html>
