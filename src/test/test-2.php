<SCRIPT LANGUAGE="javascript">
<!--
function AllAreaWord() 
{
	if(document.all("table_storage").rows.length==0){
		alert("没有内容可导！");
		return;
	}
	try{
		var oWD = new ActiveXObject("Word.Application"); 
	}
	catch(e){
		alert("无法调用Office对象，请确保您的机器已安装了Office并已将本系统的站点名加入到IE的信任站点列表中！");
		return;
	}
	var oDC = oWD.Documents.Add("",0,1); 
	var oRange =oDC.Range(0,1); 
	var sel = document.body.createTextRange(); 
	sel.moveToElementText(table_storage); //tab 为导出数据所在的表格ID
	sel.select(); 
	sel.execCommand("Copy"); 
	oRange.Paste(); 
	oWD.Application.Visible = true; 
}
function AutomateExcel(){	
	try{
		var appExcel = new ActiveXObject( "Excel.Application" ); 
	}
	catch(e){
	  alert("无法调用Office对象，请确保您的机器已安装了Office并已将本系统的站点名加入到IE的信任站点列表中！");
	  return;
	}
	var elTable = document.getElementById("table_storage"); //outtable 为导出数据所在的表格ID；
	var oRangeRef = document.body.createTextRange(); 
	
	oRangeRef.moveToElementText( elTable ); 
	oRangeRef.execCommand( "Copy" );
	
	appExcel.Visible = true; 
	appExcel.Workbooks.Add().Worksheets.Item(1).Paste(); 
	appExcel = null;
}
//-->
</SCRIPT>

<input type="button" name="tab" onClick="AutomateExcel();" value="导出到excel" class="notPrint">
<table border="1" cellpadding="0" cellspacing="0" id=outtable>
  <tr height="28">
    <td width="27" height="86" rowspan="4" bgcolor="#ffffcc">序号</td>
    <td width="111" rowspan="4" bgcolor="#ffffcc"><div align="center">服务网点</div></td>
    <td width="402" colspan="7" bgcolor="#ffffcc"><div align="center">用户满意度</div></td>
  </tr>
  <tr height="19">
    <td width="100" height="39" colspan="3" rowspan="2" bgcolor="#ffffcc"><div align="center">样本数量</div></td>
    <td width="218" colspan="3" rowspan="2" bgcolor="#ffffcc">对该服务网点实施本次活动的整体评价，满分10分（平均分数）</td>
    <td width="84" rowspan="3" bgcolor="#ffffcc"><div align="center">季度平均分</div></td>
  </tr>
  <tr height="20"> </tr>
  <tr height="19">
    <td width="29" height="19" bgcolor="#ffffcc"><div align="center">4月</div></td>
    <td width="29" bgcolor="#ffffcc"><div align="center">5月</div></td>
    <td width="42" bgcolor="#ffffcc"><div align="center">合计</div></td>
    <td width="68" bgcolor="#ffffcc"><div align="center">4月</div></td>
    <td width="68" bgcolor="#ffffcc"><div align="center">5月</div></td>
    <td width="82" bgcolor="#ffffcc"><div align="center">合计</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
    <td bgcolor="#ffffcc">&nbsp;</td>
  </tr>
</table>



--------------------------------------------------------------------------------
