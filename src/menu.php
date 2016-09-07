<?php
   session_start();
?>
<SCRIPT language=javascript>
var itemp;
var tobj="";
itemp="";
function leftBgOver(obj){//菜单
	obj.style.background="url(images/left_bg02.gif) center no-repeat";
	//obj.style.position="center";
	//obj.style.repeat="no-repeat":
}

function leftBgOut(obj,sty){
	//alert( (sty)?"url(" + sty + ")":"");
if (tobj!="")
{
sty="images/left_bg01.gif";
obj.style.background= (sty)?"url(" + sty + ")":"";
}
else 
{
obj.style.background= (sty)?"url(" + sty + ")":"";
}
}
</script>
<script language="javascript">
function collapse(objid)
{
	var obj = document.getElementById(objid);
	collapseAll();
	obj.style.display = '';
}
function collapseAll()
{
	for (var i=0; i<8; i++)
	{
		var obj = document.getElementById('g_' + i.toString());
		if (obj) obj.style.display = 'none';
	}
}
function expandAll()
{
	for (var i=0; i<8; i++)
	{
		var obj = document.getElementById('g_' + i.toString());
		if (obj) obj.style.display = '';
	}
}
</script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style rel="stylesheet" type="text/css">
body {margin:0px 5px;}
img{border:none;}
.menuall{text-align:center;width:149px;background:#ffffff;}
.menuall div{margin:0px 0 5px 10px;text-align:left;}
</style>
</head>
<body>
<SCRIPT language=JavaScript>
				nereidFadeObjects = new Object();
				nereidFadeTimers = new Object();
				function nereidFade(object, destOp, rate, delta){
				if (!document.all)
				return
					if (object != "[object]"){ 
						setTimeout("nereidFade("+object+","+destOp+","+rate+","+delta+")",0);
						return;
					}
					clearTimeout(nereidFadeTimers[object.sourceIndex]);
					diff = destOp-object.filters.alpha.opacity;
					direction = 1;
					if (object.filters.alpha.opacity > destOp){
						direction = -1;
					}
					delta=Math.min(direction*diff,delta);
					object.filters.alpha.opacity+=direction*delta;
					if (object.filters.alpha.opacity != destOp){
						nereidFadeObjects[object.sourceIndex]=object;
						nereidFadeTimers[object.sourceIndex]=setTimeout("nereidFade(nereidFadeObjects["+object.sourceIndex+"],"+destOp+","+rate+","+delta+")",rate);
					}
				}
				</SCRIPT>
<table border="0" cellpadding="0" cellspacing="0" class="menuall">
<tr>
<td><img src="images/left_top.gif" alt="" /></td>
</tr>
<tr>
<td>
<a href="javascript:expandAll()" target="_self"><img src="images/extand.gif" alt="展开菜单" onMouseOver=nereidFade(this,100,10,5) style="FILTER:alpha(opacity=50)" onMouseOut=nereidFade(this,50,10,5) /></a>&nbsp;<a href="javascript:collapseAll()" target="_self"><img src="images/collapse.gif" alt="收拢菜单" onMouseOver=nereidFade(this,100,10,5) style="FILTER:alpha(opacity=50)" onMouseOut=nereidFade(this,50,10,5) /></a></td>
</tr>
<tr>

<td onClick="collapse('g_0')" style="cursor:hand;"><img src="images/menu_h.gif" border="0" /></td>
</tr>
<tr>
<td id="g_0"><table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
  
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/company/company_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>往来单位管理</td>
      </tr></table></td>
    </tr>

    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/depart/depart_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>部门设置</td>
      </tr></table></td>
    </tr>

 <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/employee/employee_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>员工管理</td>
      </tr></table></td>
    </tr>

    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/warehouse/warehouse_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>仓库设置</td>
      </tr></table></td>
    </tr>
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/inoutsetting.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>出/入库类别设置</td>
      </tr></table></td>
    </tr>
      

	<tr><td height="5"></td></tr>
  </tbody>
</table></td>
</tr>
<tr>

<tr>
<td onClick="collapse('g_5')" style="cursor:hand;"><img src="images/menu_e.gif" border="0" /></td>
</tr>
<tr>
<td id="g_5"><table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/itemclassify/itemclassify_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>货品分类管理</td>
      </tr></table></td>
    </tr>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='product/showproduct?mtype=1&stype=1';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>货品信息管理</td>
      </tr></table></td>
    </tr>
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='product/addproduct.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>添加新货品</td>
      </tr></table></td>
    </tr>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='basic/measureunit/measureunit_show.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>计量单位管理</td>
      </tr></table></td>
    </tr>
	<tr><td height="5"></td></tr>
  </tbody>
</table></td>
</tr>

<td onClick="collapse('g_1')" style="cursor:hand;"><img src="images/menu_a.gif" border="0" /></td>
</tr>
<tr>
<td id="g_1"><table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='receipt_inout/receipt_in.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>货品入库</td>
      </tr></table></td>
    </tr>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='receipt_inout/receipt_out.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>货品出库</td>
      </tr></table></td>
    </tr>
	
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='inquire_inout/inquire_inout_item.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>出入库明细</td>
      </tr></table></td>
    </tr>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='inquire_inout/inquire_inout_receipt.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>出入库查询</td>
      </tr></table></td>
    </tr>
    
  </tbody>
</table></td>
</tr>
<tr>
<td onClick="collapse('g_2')" style="cursor:hand;"><img src="images/menu_b.gif" border="0" /></td>
</tr>
<tr>
<td id="g_2"><table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='receipt_exchange/receipt_exchange.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>库存调拨</td>
      </tr></table></td>
    </tr>
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='receipt_check/receipt_check.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>库存盘点</td>
      </tr></table></td>
    </tr>
	
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='inquire_others/inquire_exchange_receipt.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>库存调拨明细</td></tr></table></td>
    </tr>
	
    <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='inquire_others/inquire_check_receipt.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>库存盘点明细</td>
      </tr></table></td>
    </tr>
	 
	 <tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='inquire_storage/inquire_storage_allitem.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td>
      <td>库存查询</td>
      </tr></table></td>
    </tr>
	 
	<tr><td height="5"></td></tr>
  </tbody>
</table></td>
</tr>



<tr>
<td onClick="collapse('g_6')" style="cursor:hand;"><img src="images/menu_f.gif" border="0" /></td>
</tr>
<tr>
<td id="g_6"><table width="100%" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='system/adminsetting.php?name=<?php echo $_SESSION[username];?>';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>操作用户管理</td></tr></table></td>
    </tr>
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='system/databackup.php';" onMouseOver="leftBgOver(this);" onMouseOut="leftBgOut(this,'images/left_bg01.gif');"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>数据备份</td></tr></table></td>
    </tr>
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='system/datarecovery.php';"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>数据还原</td></tr></table></td>
    </tr>
	<tr>
      <td height="30" align="center" background="images/left_bg01.gif" style="cursor:hand"  onclick="javascript:parent.right.location.href='system/slog.php';"><table cellpadding="0" cellspacing="0" width="100%"><tr><td width="50">&nbsp;</td><td>系统登陆日志</td></tr></table></td>
    </tr>
	<tr><td height="5"></td></tr>
  </tbody>
</table></td>
</tr>

<tr>
<td><img src="images/left_bottom.gif" alt="" /></td>
</tr>
</table>
<script>
collapseAll();
collapse('g_1')
</script>
