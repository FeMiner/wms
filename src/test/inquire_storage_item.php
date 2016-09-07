<?php
	$itemid = $_GET[itemid];
	$con = mysql_connect("localhost","root","1234");
	mysql_select_db("db_wms", $con);
	mysql_query("set names gb2312 ");
			
	$flag = '';
	if($itemid=='')
		$flag = 'none';
	
	if($flag == ''){//获取仓库信息
		$query = "select * from table_warehouse order by id";//echo $query."<br>";
		$result_warehouse = mysql_query($query);
	}

	if($flag == ''){//获取货品信息
		$query = "select * from tb_product where encode = '$itemid'";//echo $query."<br>";
		$result_iteminfo = mysql_query($query);	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>库存查询-货品</title>
</head>
<style>
</style>
<script type="text/javascript" src="../js/Calendar3.js"></script>
<script language="javascript">
function selectitem(){//选择对象
	//var url = 'item_choose.php';
	var url = '../../wms2/product/showproduct.php?stype=1&mtype=1';
	window.open(url,'_blank','directorys=no,toolbar=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=853,height=470,top=176,left=161');
}
</script>
<link rel="stylesheet" type="text/css" href="../css/iframe.css" media="screen" />
<body>
<form id="form" name="form" method="post" >
  <h3>库存查询-货品</h3>
  <fieldset>
  <legend>货品信息</legend>
  <label>查询货品</label>
  <input id="item_id" name="item_id" type="text"  style="background-color:#CCCCCC" <?php echo "value = '$itemid'";?>  onclick="selectitem()"/>
  <button type="button" onclick="location.href='inquire_storage_item.php?itemid='+document.getElementById('item_id').value">&nbsp;查询&nbsp;</button>
  <input id="item_name" name="item_name" type="text" size="5" style="background-color:#CCCCCC" hidden />
  <input id="item_model" name="item_model" type="text" size="5" style="background-color:#CCCCCC" hidden />
  <input id="item_unit" name="item_unit" type="text" size="5" style="background-color:#CCCCCC" hidden />
  </fieldset>
  <fieldset>
  <legend>货品信息</legend>
  <table id="iteminfo" width="500" border="1" cellspacing="0" cellpadding="5" style="font-size:12px; border:thin; border-color:#9999FF ">
    <tr align="center">
      <td>货品编号</td>
      <td>货品名称</td>
      <td>规格型号</td>
      <td>单位</td>
	  <td>库存上限</td>
	  <td>库存下限</td>
    </tr>
    <?php //显示货品信息
		echo "<tr align='center'>";
		
		if($flag == 'none')
			echo "<td>请指定查询的货品ID</td>";
		else{
			$RS = mysql_fetch_array($result_iteminfo);	
			if(empty($RS))
				echo "<td>该货品编码不存在</td>";
			else{
				echo "<td>$RS[encode]</td>";
				echo "<td>$RS[name]</td>";
				echo "<td>$RS[size]</td>";
				echo "<td>$RS[unit]</td>";
				echo "<td id='upperlimit'>$RS[upperlimit]</td>";
				echo "<td id='lowerlimit'>$RS[lowerlimit]</td>";
			}
		}
		
		echo "</tr>";
	?>
  </table>
  </fieldset>
  <fieldset>
  <legend>库存列表</legend>
  <table id="storage_table" width="500" border="1" cellspacing="0" cellpadding="5" style="font-size:12px; border:thin; border-color:#9999FF ">
    <tr align="center">
      <td>仓库编号</td>
      <td>仓库名称</td>
      <td>库存数量</td>
    </tr>
    <?php //显示该商品的库存信息
		
		if($flag == ''){//查询仓库中该货品的库存
			$sum = 0;
			while($RS = mysql_fetch_array($result_warehouse)){
				echo "<tr align='center'>";
				echo "<td>$RS[id]</td>";
				echo "<td>$RS[name]</td>";
				$query = "select * from table_warehouse_$RS[id] where id = '$itemid'";//echo $query."<br>";
				$result_storage = mysql_query($query);
				$RS2 = mysql_fetch_array($result_storage);
				if(empty($RS2))
					echo "<td>0</td>";
				else
					echo "<td>$RS2[num]</td>";
				echo "</tr>";
				
				$sum += $RS2[num];
			}
		}
		echo "<tr><td></td><td align='center'>总计：</td><td align='center' id='storage'>$sum</td></tr>";
		
	?>
  </table>
  </fieldset>
</form>
<?php
if($flag == ''){
	if(!empty($RS)){
		echo "";
	}
}
?>
<script language="javascript">
var upperlimit = Number(document.getElementById('upperlimit').innerHTML);
var lowerlimit = Number(document.getElementById('lowerlimit').innerHTML);
var storage = Number(document.getElementById('storage').innerHTML);
if(storage > upperlimit)
	alert("库存超出上限");
else if(storage < lowerlimit)
	alert("库存低于下限");
else
	alert("库存正常");
</script>
<p><a href="../basic/company/company_show.php">返回上一页</a></p>
</body>
</html>
