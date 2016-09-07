<?php
	$con = mysql_connect("localhost","root","1234");
	mysql_select_db("db_wms", $con);
	mysql_query("set names gb2312 ");
	
	$limit_string = '';
	$option = $_GET[option];//echo $option;
	if($option == 'date'){
		$date1 = $_GET[date1];
		$date2 = $_GET[date2];
		if($date1 != '' && $date2 == '')
			$limit_string = " and date >= '$date1'";
		else if($date2 != '' && $date1 == '')
			$limit_string = " and date <= '$date2'";
		else if($date1 != '' && $date2 != '')
			$limit_string = " and date between '$date1' and '$date2'";
	}
	else if($option == 'type'){
		$id = $_GET[id];
		$limit_string = " and type = '$id'";
	}
	else if($option == 'warehouse'){
		$id = $_GET[id];
		$limit_string = " and warehouse = '$id'";
	}
	else if($option == 'company'){
		$id = $_GET[id];
		$limit_string = " and company = '$id'";
	}
	
	$query = "select count(*) as num from test_receipt where 1".$limit_string;//echo $query."<br>";die();
	$result = mysql_query($query) or die("Invalid query: " . mysql_error());
	$RS = mysql_fetch_array($result);
	$num = $RS[num];
	
	$query = "select * from test_receipt where 1".$limit_string;//echo $query."<br>";die();
	$result_receipt = mysql_query($query);
	
	$query = "select * from tb_inout order by id";//echo $query."<br>";
	$result_type = mysql_query($query);//获取出入库类型列表
	
	$query = "select * from table_warehouse order by id";//echo $query."<br>";
	$result_warehouse = mysql_query($query);//获取仓库列表
	
	$query = "select * from table_company order by id";//echo $query."<br>";
	$result_company = mysql_query($query);//获取公司列表

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>出入库查询-单据</title>
</head>
<script type="text/javascript" src="../js/TableSort_mains.js"></script>
<script type="text/javascript" src="../js/Calendar3.js"></script>
<script language="javascript">
function gotoUrl(target){
	var id = target.innerHTML;
	var url = "receipt_show_inout.php?id="+id;
	//location.href = url;
	window.open(url,'_blank','directorys=no,toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=640,height=480,top=176,left=161');
}
function optionChange(object){
	hideAll();
	switch(object.value){
		case 'inquiry_time':
			document.getElementById('inquiry_time').hidden = false;
			break;
		case 'inquiry_type':
			document.getElementById('inquiry_type').hidden = false;
			break;
		case 'inquiry_warehouse':
			document.getElementById('inquiry_warehouse').hidden = false;
			break;
		case 'inquiry_company':
			document.getElementById('inquiry_company').hidden = false;
			break;
		default:break;
	}
}
function hideAll(){
	document.getElementById('inquiry_time').hidden = true;
	document.getElementById('inquiry_type').hidden = true;	
	document.getElementById('inquiry_warehouse').hidden = true;
	document.getElementById('inquiry_company').hidden = true;
}
</script>
<body>
<h3>出入库查询-单据</h3>
<?php
echo "<p>共有 $num 条记录</p>";
?>
<!--精确查询框架-->
<div style="margin-bottom:8px; height:20px">
精确查询：
<input id="receipt_id" name="receipt_id" type="text" value="请输入单据ID" onclick="this.value=''" onblur="if(this.value=='') this.value='请输入单据ID'"/>
<input name="search" type="button" value="查找" onclick="location.href='receipt_show_inout.php?id=' + document.getElementById('receipt_id').value"/>
</div>
<!--精确查询框架-->
<!--查询框架-->
<div style="margin-bottom:8px; height:20px">
  <!--查询方式选择-->
  <div style="float:left">查询方式：
    <select id="inquiry" name="inquiry" onchange="optionChange(this)">
      <option value="none" selected="selected">无</option>
      <option value="inquiry_time">时间范围</option>
	  <option value="inquiry_company">公司</option>
      <option value="inquiry_warehouse">仓库</option>
      <option value="inquiry_type">出入库类型</option>
    </select>
  </div>
  <!--查询方式选择-->
  <!--日期-->
  <div id="inquiry_time"  style="float:left"> 从
    <input name="date1" type="text" id="date1" onclick="new Calendar().show(this);" size="8" maxlength="10"/>
    到
    <input name="date2" type="text" id="date2" onclick="new Calendar().show(this);" size="8" maxlength="10" />
    <input name="search" type="button" value="查找" onclick="location.href='inquire_inout_receipt.php?option=date&date1=' + document.getElementById('date1').value + '&date2=' + document.getElementById('date2').value"/>
  </div>
  <!--日期-->
  <!--出入库类型-->
  <div id="inquiry_type">
    <select name="menu1" onchange="location.href='inquire_inout_receipt.php?option=type&id='+this.value">
      <option value="">请选择</option>
      <?php 
	  	while($RS = mysql_fetch_array($result_type))
			echo "<option value='$RS[id]'>$RS[name]</option>";
	  ?>
    </select>
  </div>
  <!--出入库类型-->
  <!--仓库-->
  <div id="inquiry_warehouse">
    <select name="menu1" onchange="location.href='inquire_inout_receipt.php?option=warehouse&id='+this.value">
      <option value="none">请选择</option>
      <?php 
	  	while($RS = mysql_fetch_array($result_warehouse))
			echo "<option value='$RS[id]'>$RS[name]</option>";
	  ?>
    </select>
  </div>
  <!--仓库-->
  <!--公司-->
  <div id="inquiry_company">
    <select name="menu1" onchange="location.href='inquire_inout_receipt.php?option=company&id='+this.value">
      <option value="none">请选择</option>
      <?php 
	  	while($RS = mysql_fetch_array($result_company))
			echo "<option value='$RS[id]'>$RS[name]</option>";
	  ?>
    </select>
  </div>
  <!--公司-->
</div>
<!--查询框架-->
<script language="javascript">hideAll();</script>
<div><input name="" type="button" value="显示全部" onclick="location.href='inquire_inout_receipt.php'"/></div>
<table id="MyTable" width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#9999FF">
  <thead>
  <tr align="center" bordercolor="#9999FF">
    <td onclick="SortTable('MyTable',0,'string')" style="cursor:pointer">单据编号</td>
    <td onclick="SortTable('MyTable',1,'string')" style="cursor:pointer">制单日期</td>
    <td onclick="SortTable('MyTable',2,'string')" style="cursor:pointer">业务员</td>
    <td onclick="SortTable('MyTable',3,'string')" style="cursor:pointer">交易公司</td>
    <td onclick="SortTable('MyTable',4,'string')" style="cursor:pointer">出入库仓库</td>
    <td onclick="SortTable('MyTable',5,'string')" style="cursor:pointer">出入库类型</td>
    <td>备注</td>
  </tr>
  </thead>
  <tbody>
  <?php
	while($RS = mysql_fetch_array($result_receipt))
	{
		echo "<tr align='center' bordercolor='#9999FF'>";
		echo "<td onclick='gotoUrl(this)' style='background-color:#CCCCCC;cursor:pointer'>$RS[id]</td>\n";
		echo "<td>$RS[date]</td>\n";
		echo "<td>$RS[yewuyuan]</td>\n";
		$query = "select name from table_company where id = '$RS[company]'";//echo $query."<br>";
		$result = mysql_query($query);
		$RS2 = mysql_fetch_array($result);
		echo "<td>$RS2[name]</td>\n";//公司名称
		$query = "select name from table_warehouse where id = '$RS[warehouse]'";//echo $query."<br>";
		$result = mysql_query($query);
		$RS2 = mysql_fetch_array($result);
		echo "<td>$RS2[name]</td>\n";//仓库名称
		$query = "select name from tb_inout where id = '$RS[type]'";//echo $query."<br>";
		$result = mysql_query($query);
		$RS2 = mysql_fetch_array($result);
		echo "<td>$RS2[name]</td>\n";//出入库类型
		echo "<td>$RS[remark]</td>\n";
		echo "</tr>";
	}
?></tbody>
</table>
</body>
</html>
