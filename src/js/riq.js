// JavaScript Document
	function loadCalendar(field)
	{
   var rtn = window.showModalDialog("../inc/calender.php","","dialogWidth:280px;dialogHeight:250px;status:no;help:no;scrolling=no;scrollbars=no");
	if(rtn!=null)
		field.value=rtn;
   return;
}