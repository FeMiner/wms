<?php
	$con = mysql_connect("localhost","root","1234");
	mysql_select_db("db_wms", $con);
	mysql_query("set names gb2312 ");
	
	$limit_string = '';
	$option = $_GET[option];//echo $option;
	if($option == 'type'){
		$id = $_GET[id];
		$limit_string = " and type = '$id'";
	}
	else if($option == 'receipt'){
		$id = $_GET[id];
		$limit_string = " and receipt = '$id'";
	}
	else if($option == 'item'){
		$id = $_GET[id];
		$limit_string = " and item = '$id'";
	}
	
	$query = "select count(*) as num from test_inout where 1".$limit_string;//echo $query."<br>";
	$result = mysql_query($query) or die("Invalid query: " . mysql_error());
	$RS = mysql_fetch_array($result);
	$num = $RS[num];
	
	$query = "select * from test_inout where 1".$limit_string;//echo $query."<br>";
	$result_receipt = mysql_query($query);
	
	$query = "select * from tb_inout order by id";//echo $query."<br>";
	$result_type = mysql_query($query);//获取出入库类型列表
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>出入库查询-货品</title>
</head>
<script language="javascript">
function gotoURL(target){
	var id = target.innerHTML;
	var url = "receipt_show_inout.php?id="+id;
	//location.href = url;
	window.open(url,'_blank','directorys=no,toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=640,height=480,top=176,left=161');
}
function gotoURL2(target){
	var id = target.innerHTML;
	var url = "receipt_show_exchange.php?id="+id;
	//location.href = url;
	window.open(url,'_blank','directorys=no,toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=640,height=480,top=176,left=161');
}
function optionChange(object){
	hideAll();
	switch(object.value){
		case 'inquiry_type':
			document.getElementById('inquiry_type').hidden = false;
			break;
		case 'inquiry_item':
			document.getElementById('inquiry_item').hidden = false;
			break;
		case 'inquiry_receipt':
			document.getElementById('inquiry_receipt').hidden = false;
			break;
		default:break;
	}
}
function hideAll(){
	
	document.getElementById('inquiry_type').hidden = true;	
	document.getElementById('inquiry_item').hidden = true;	
	document.getElementById('inquiry_receipt').hidden = true;
}
</script>
<script type="text/javascript" src="../js/TableSort_mains.js"></script>
<body>
<h3>出入库查询-货品</h3>
<?php
echo "<p>共有 $num 条记录</p>";
?>
<!--精确查询框架-->
<!--<div style="margin-bottom:8px; height:20px"> 精确查询：
  <input id="receipt_id" name="receipt_id" type="text" value="请输入单据ID" onclick="this.value=''" onblur="if(this.value=='') this.value='请输入单据ID'"/>
  <input name="search" type="button" value="查找" onclick="location.href='receipt_show_inout.php?id=' + document.getElementById('receipt_id').value"/>
</div>-->
<!--精确查询框架-->
<!--查询框架-->
<div style="margin-bottom:8px; height:20px">
  <!--查询方式选择-->
  <div style="float:left">查询方式：
    <select id="inquiry" name="inquiry" onchange="optionChange(this)">
      <option value="none" selected="selected">无</option>
      <option value="inquiry_item">货品ID</option>
      <option value="inquiry_receipt">出入库单</option>
      <option value="inquiry_type">出入库类型</option>
    </select>
  </div>
  <!--查询方式选择-->
  <!--出入库类型-->
  <div id="inquiry_type">
    <select name="menu1" onchange="location.href='inquire_inout_item.php?option=type&id='+this.value">
      <option value="none">请选择</option>
      <?php 
	  	while($RS = mysql_fetch_array($result_type))
			echo "<option value='$RS[id]'>$RS[name]</option>";
	  ?>
      <option value="none">仓库调拨</option>
    </select>
  </div>
  <!--出入库类型-->
  <!--货品ID-->
  <div id="inquiry_item">
    <input id="item_id" name="item_id" value="请输入货品ID" type="text" onclick="this.value=''" onblur="if(this.value=='') this.value='请输入货品ID'"/>
    <input name="button" type="button" value="查询" onclick="location.href='inquire_inout_item.php?option=item&id=' + document.getElementById('item_id').value"/>
  </div>
  <!--货品ID-->
  <!--出入库单据ID-->
  <div id="inquiry_receipt">
    <input id="receipt_id" name="item_id" value="请输入单据ID" type="text" onclick="this.value=''" onblur="if(this.value=='') this.value='请输入单据ID'"/>
    <input name="button" type="button" value="查询" onclick="location.href='inquire_inout_item.php?option=receipt&id=' + document.getElementById('receipt_id').value"/>
  </div>
  <!--出入库单据ID--->
</div>
<script language="javascript">
hideAll();
</script>
<div>
  <input name="" type="button" value="显示全部" onclick="location.href='inquire_inout_item.php'"/>
</div>
<table id="MyTable" width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#9999FF">
  <thead>
  <tr align="center">
    <td rowspan="2" onclick="SortTable('MyTable',0,'string')" style="cursor:pointer">记录编号</td>
    <td colspan="4">货品信息</td>
    <td colspan="3">出入库信息</td>
    <td colspan="2">所属单据信息</td>
  </tr>
  <tr align="center">
    <td onclick="SortTable('MyTable',1,'string')" style="cursor:pointer">货品ID</td>
    <td onclick="SortTable('MyTable',2,'string')" style="cursor:pointer">名称</td>
    <td onclick="SortTable('MyTable',3,'string')" style="cursor:pointer">型号</td>
    <td onclick="SortTable('MyTable',4,'string')" style="cursor:pointer">单位</td>
    <td onclick="SortTable('MyTable',5,'int')" style="cursor:pointer">数量</td>
    <td onclick="SortTable('MyTable',6,'float')" style="cursor:pointer">价格</td>
    <td onclick="SortTable('MyTable',7,'string')" style="cursor:pointer">类型</td>
    <td onclick="SortTable('MyTable',8,'string')" style="cursor:pointer">单据ID</td>
    <td onclick="SortTable('MyTable',9,'string')" style="cursor:pointer">仓库</td>
  </tr>
  </thead>
  <tbody>
  <?php
	while($RS = mysql_fetch_array($result_receipt))
	{
		echo "<tr align='center'>";
		echo "<td>$RS[id]</td>";
		
		echo "<td  style='background-color:#CCCCCC'>$RS[item]</td>";
		
		if(1){
			$query = "select * from tb_product where encode = '$RS[item]'";
			$result_iteminfo = mysql_query($query);
			$RS2 = mysql_fetch_array($result_iteminfo);
			echo "<td>$RS2[name]</td>";
			echo "<td>$RS2[size]</td>";
			echo "<td>$RS2[unit]</td>";
		}
		else{
			echo "<td></td>";
			echo "<td></td>";
			echo "<td></td>";
		}

		echo "<td>$RS[num]</td>";
		echo "<td>$RS[price]</td>";
		
		if($RS[type]!='none'){
			$query = "select name from tb_inout where id = '$RS[type]'";//echo $query."<br>";
			$result = mysql_query($query);
			$RS2 = mysql_fetch_array($result);
			echo "<td>$RS2[name]</td>\n";//出入库类型
		}
		else
			echo "<td>仓库调拨</td>\n";
		
		if($RS[type]!='none'){
			echo "<td onclick='gotoURL(this)' style='background-color:#CCCCCC'>$RS[receipt]</td>\n";			
			$query = "select warehouse from test_receipt where id = '$RS[receipt]'";//echo $query."<br>";
			$result = mysql_query($query);
			$RS2 = mysql_fetch_array($result);
			$query = "select name from table_warehouse where id = '$RS2[warehouse]'";//echo $query."<br>";
			$result = mysql_query($query);
			$RS3 = mysql_fetch_array($result);
			echo "<td>$RS3[name]</td>\n";
		}
		else{
			echo "<td onclick='gotoURL2(this)' style='background-color:#CCCCCC'>$RS[receipt]</td>\n";	
			$query = "select warehouse from test_exchange where id = '$RS[receipt]'";//echo $query."<br>";
			$result = mysql_query($query);
			$RS2 = mysql_fetch_array($result);
			$query = "select name from table_warehouse where id = '$RS2[warehouse]'";//echo $query."<br>";
			$result = mysql_query($query);
			$RS3 = mysql_fetch_array($result);
			echo "<td>$RS3[name]</td>\n";
		}
		echo "</tr>";
	}
?></tbody>
</table>
</body>
</html>
