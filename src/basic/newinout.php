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
    <td height="20" align="center" bgcolor="#3399FF"><span class="STYLE9">货品出库/入库类别设置</span>     -<span class="STYLE10">新增类别</span></td>
  </tr>
  <tr>
    <td align="center"><form name="form1" method="post" action="savenewinout.php">
      <label>类别
      <select name="type" onChange="showhide(this.value);">
        <option value="入库" selected>入库</option>
        <option value="出库">出库</option>
      </select>
      </label>
        <label>名称
        <input type="text" name="name">
        </label>
        <p>
		<div id="content">
          <label>是否参与成本核算
          <select name="cost">
            <option value="1">是</option>
            <option value="0" selected>否</option>
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
