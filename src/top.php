
<STYLE type=text/css>
A:link {
	FONT-SIZE: 12px; COLOR: #666666; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A:active {
	FONT-SIZE: 12px; COLOR: #666666; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A:visited {
	FONT-SIZE: 12px; COLOR: #666666; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A:hover {
	FONT-SIZE: 12px; COLOR: #f29422; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A.blue:link {
	FONT-SIZE: 12px; COLOR: #ffffff; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A.blue:active {
	FONT-SIZE: 12px; COLOR: #73a2d6; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A.blue:visited {
	FONT-SIZE: 12px; COLOR: #ffffff; LINE-HEIGHT: 20px; TEXT-DECORATION: none
}
A.blue:hover {
	FONT-SIZE: 12px; COLOR: #73a2d6; LINE-HEIGHT: 20px; TEXT-DECORATION: underline
}
</STYLE>
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
</HEAD>
<BODY leftMargin=0 topMargin=0 scroll=no marginheight="0" marginwidth="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgColor=#3a6592 style="color:#FFFFFF; font-size:12px;">
  <tr>
    <td height="28" width="214"><a href="main.php" target="_blank"><IMG src="images/Title.jpg" height="29" border="0"></a></td>
    <td width="68" nowrap="nowrap">&nbsp;</td>
    <td width="326">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="*" align="right" nowrap="nowrap">
	  [<A class=blue href="#" onClick="showModalDialog('about.htm',window,'dialogHeight:360px;dialogWidth:360px;dialogleft:400px;help:no;status:no;scroll:no');">关于系统</A>]	  [<A class=blue href="javascript:parent.location.href='logout.php'" onClick="return confirm('确定要退出吗？');">安全退出</A>]
&nbsp;&nbsp;	</td>
  </tr>
</table>
<a href="main.php"></a>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0 background=images/topnav_bg.jpg>
  <TR>
    <TD width="160" height=35>&nbsp;</TD>
	<TD valign="bottom" width="45">&nbsp;</TD>
	<TD valign="bottom" width="95">
	  <a href="receipt_inout/receipt_in.php" target="right"><img src="images/button1.jpg" border="0"></a>	</TD>
	<TD valign="bottom" width="95">
	  <a href="inquire_storage/inquire_storage_allitem.php" target="right"><img src="images/button2.jpg" border="0"></a>	</TD>
	<TD valign="bottom" width="95">
	  <a href="receipt_inout/receipt_out.php" target="right"><img src="images/button3.jpg" border="0"></a>	</TD>
    <TD valign="bottom" width="95">
	  <a href="baojin.asp" target="right"></a>	<a href="system/modifypwd.php" target="right"><img src="images/button7.jpg" border="0"></a></TD>
	<TD valign="bottom" width="95">
	  <a href="huiyuan/huiyuan.asp" target="right"></a><a href="desk.php" target="right"><img src="images/button8.jpg" border="0"></a><a href="money/money.asp" target="right"></a></TD>
	<TD valign="bottom" width="95">&nbsp;</TD>
	<TD valign="bottom" width="95">&nbsp;</TD>
	<TD valign="bottom" width="*">&nbsp;</TD>		
  </TR></TABLE>

