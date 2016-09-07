<?php
	$con = mysql_connect("localhost","root","1234");
	mysql_select_db("db_wms", $con);
	mysql_query("set names gb2312 ");
	
	$query = "select count(*) as num from tb_product where 1";//echo $query."<br>";die();
	$result = mysql_query($query) or die("Invalid query: " . mysql_error());
	$RS = mysql_fetch_array($result);
	$num = $RS[num];
	
	$query = "select * from tb_product where 1 order by encode";//echo $query."<br>";die();
	$result_product = mysql_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>库存查询-所有货品</title>
</head>
<script type="text/javascript" src="../js/Calendar3.js"></script>
<script type="text/javascript" src="../js/TableSort_mains.js"></script>
<script language="javascript">
function gotoURL(target){
	var id = target.innerHTML;
	var url = "inquire_storage_item.php?itemid="+id;
	//location.href = url;
	window.open(url,'_blank','directorys=no,toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=640,height=480,top=176,left=161');
}
function gotoURL2(target){
	var value = target.value;
	var url = "inquire_storage_allitem.php?option="+value;
	location.href = url;
}
/*function showList(target){
	var table = document.getElementById('table_storage');
	for(var i=table.rows.length-1;i>0;i--){
		if(table.rows[i].cells[7].innerHTML != target.value)
			table.deleteRow(i);
	}
}*/
</script>
<body>
<div style="width:1000px;">
<h3>库存查询-所有货品</h3>
<p>共有 <?php echo $num; ?> 条货品记录。</p>
<div style="float:left">单击货品编号可以查看库存详情。</div>
<div style="float:right">筛选：
<select name="filter" onchange="gotoURL2(this)">
<option value="0" <?php if($_GET[option]==0) echo 'selected';?>>全部</option>
<option value="1" <?php if($_GET[option]==1) echo 'selected';?>>正常</option>
<option value="2" <?php if($_GET[option]==2) echo 'selected';?>>超出上限</option>
<option value="3" <?php if($_GET[option]==3) echo 'selected';?>>低于下限</option>
</select>
</div>
<table id="table_storage" width="100%" border="1" cellspacing="0" cellpadding="5" bordercolor="#9999FF">
  <thead><tr align="center" bordercolor="#9999FF">
    <td onclick="SortTable('table_storage',0,'string')" style="cursor:pointer">货品编号</td>
    <td onclick="SortTable('table_storage',1,'string')" style="cursor:pointer">货品名称</td>
    <td onclick="SortTable('table_storage',2,'string')" style="cursor:pointer">型号</td>
    <td onclick="SortTable('table_storage',3,'string')" style="cursor:pointer">单位</td>
    <td onclick="SortTable('table_storage',4,'int')" style="cursor:pointer">库存上限</td>
    <td onclick="SortTable('table_storage',5,'int')" style="cursor:pointer">库存下限</td>
    <td onclick="SortTable('table_storage',6,'int')" style="cursor:pointer">库存量</td>
	<td onclick="SortTable('table_storage',7,'string')" style="cursor:pointer">预警信息</td>
  </tr></thead>
  <tbody>
  <?php
	while($RS = mysql_fetch_array($result_product))
	{
		$sum = 0;
		$query = "select id from table_warehouse order by id";//echo $query."<br>";
		$result_warehouse = mysql_query($query);//获取仓库列表
		while($RS2 = mysql_fetch_array($result_warehouse)){
			$query = "select num from table_warehouse_$RS2[id] where id = '$RS[encode]'";//echo $query."<br>";
			$result_num = mysql_query($query);
			$RS3 = mysql_fetch_array($result_num);
			$sum += $RS3[num];
		}
		if($sum > $RS[upperlimit])
			$string = "超出上限";
		else if($sum < $RS[lowerlimit])
			$string = "低于下限";
		else
			$string = "正常";
			
		$option = $_GET[option];
		if($option==0 || ($option==1&&$string=="正常") || ($option==2&&$string=="超出上限") || ($option==3&&$string=="低于下限")){		
			echo "<tr align='center' bordercolor='#9999FF'>";
			echo "<td onclick='gotoURL(this)' style='background-color:#CCCCCC'>$RS[encode]</td>\n";
			echo "<td>$RS[name]</td>\n";
			echo "<td>$RS[size]</td>\n";
			echo "<td>$RS[unit]</td>\n";
			echo "<td>$RS[upperlimit]</td>\n";
			echo "<td>$RS[lowerlimit]</td>\n";
			echo "<td>$sum</td>\n";
			echo "<td>$string</td>\n";
			echo "</tr>";
		}
	}
?></tbody>
</table>
</div>
</body>
</html>
