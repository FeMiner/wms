<?php
   session_start();
?>
<STYLE>TD {
	FONT-SIZE: 12px; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif
}
</STYLE>
<script language="JavaScript">
<!--
function tick() {
var hours, minutes, seconds;
var intHours, intMinutes, intSeconds;
var today;
today = new Date();
intHours = today.getHours();
intMinutes = today.getMinutes();
intSeconds = today.getSeconds();

if (intHours == 0) {
hours = "00:";
} else if (intHours < 10) { 
hours = "0" + intHours+":";
} else {
hours = intHours + ":";
}

if (intMinutes < 10) {
minutes = "0"+intMinutes+":";
} else {
minutes = intMinutes+":";
}
if (intSeconds < 10) {
seconds = "0"+intSeconds+" ";
} else {
seconds = intSeconds+" ";
} 
timeString = hours+minutes+seconds;
Clock.innerHTML = timeString;
window.setTimeout("tick();", 1000);
}

window.onload = tick;
//-->
</script>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD bgColor=#73a3d4 height=4></TD></TR></TBODY></TABLE>
<TABLE height=28 cellSpacing=0 cellPadding=0 width="100%" bgColor=#3a6592 
border=0>
  <TBODY>
  <TR>
    <TD>
      <TABLE height="100%" cellSpacing=2 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD align=right width=109 nowrap="nowrap">
            <span id="Clock"></span></TD>
		  <TD align=right width=60>¡¡</TD>
          <TD width="*" align="center" nowrap="nowrap">²Ù×÷ÓÃ»§£º
            <?php if($_SESSION[username]!=""){
	    echo "$_SESSION[username]";
	  }
	?></TD>
          <TD 
          style="FONT-WEIGHT: bolder; FILTER: shadow(Color=#000000,direction=180)" 
          align=right width=250 nowrap="nowrap">²âÊÔ°æ£ºV1.0</TD>
        </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
