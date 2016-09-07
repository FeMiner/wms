<?php
	$warehouse = $_GET[warehouse];
	$con = mysql_connect("localhost","root","1234");
	mysql_select_db("db_wms", $con);
	mysql_query("set names gb2312 ");
		
	$query = "select * from table_warehouse order by name";//echo $query."<br>";
	$result_warehouse = mysql_query($query);
	
	if($warehouse=='')
		$warehouse='0000';
	$query = "select * from table_warehouse_$warehouse order by id asc";//die($query);
	$result_item = mysql_query($query);
	
	//mysql_close();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>库存查询-仓库</title>
</head>
<style>
</style>
<script type="text/javascript" src="../js/Calendar3.js"></script>
<link rel="stylesheet" type="text/css" href="../css/iframe.css" media="screen" />
<body>
<form id="item_in" name="item_in" method="post" action="../test/receipt_out_bg.php" onsubmit=" return checkForm()">
  <h3>库存查询-仓库</h3>
  <fieldset>
  <legend>仓库信息</legend>
  <label>查询仓库</label>
  <select id="warehouse" name="warehouse" onchange="location.href='inquire_storage_warehouse.php?warehouse='+this.value">
    <?php 
	while($RS = mysql_fetch_array($result_warehouse))
		if($warehouse == $RS[id])
			echo "<option value='$RS[id]' selected>$RS[name]</option>";
		else
			echo "<option value='$RS[id]'>$RS[name]</option>";
	?>
  </select>
  </fieldset>
  <fieldset>
  <legend>库存列表</legend>
  <table id="storage" width="500" border="1" cellspacing="0" cellpadding="5" style="font-size:12px; border:thin; border-color:#9999FF ">
    <tr align="center">
      <td>货品编号</td>
      <td>货品名称</td>
      <td>规格型号</td>
      <td>单位</td>
      <td>数量</td>
    </tr>
    <?php
	while($RS = mysql_fetch_array($result_item)){
		echo "<tr align='center'>";
		echo "<td>$RS[id]</td>";
		
		if(1){
			$query = "select * from tb_product where encode = '$RS[id]'";
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
		echo "</tr>";
	}
	?>
  </table>
  </fieldset>
</form>
<p><a href="../basic/company/company_show.php">返回上一页</a></p>
</body>
</html>
