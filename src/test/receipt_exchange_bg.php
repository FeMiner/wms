<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<?php
include "../basic/include.php";

$date = $_POST[date];
$yewuyuan = $_POST[yewuyuan];
$type = "none";
$warehouse = $_POST[warehouse];
$warehouse2 = $_POST[warehouse2];
$remark = $_POST[remark];
$itemstr = $_POST[item_str];

//echo "$yewuyuan||$date||$warehouse||$warehouse2||$type||$itemstr";die();

if($yewuyuan==''||$date==''||$warehouse==''||$warehouse2==''||$type==''||$itemstr=='' )//$id==''||
	$error='提交的表单有误！';
else
{	
	$date2 = date("ymd");
	$id = $date2."00";
	$con = mysql_connect("localhost","root","1234") or die("不能连接到Mysql Server");
	mysql_select_db("db_wms", $con) or die("数据库选择失败");
	mysql_query("set names gb2312");
	
	if(mysql_query("select * from table_warehouse_$warehouse")==false)//检查目标仓库书库表是否健在
		die("仓库$warehouse不存在！");
	if(mysql_query("select * from table_warehouse_$warehouse2")==false)//检查目标仓库书库表是否健在
		die("仓库$warehouse2不存在！");
		
	$query = "select * from test_exchange where id = '$id'";
	$result = mysql_query($query);
	$RS = mysql_fetch_array($result);
	
	while(!empty($RS)){
		if(($id = next_value($id))!="Overflow!"){//获取可用ID
			$query = "select * from test_exchange where id = '$id'";
			$result = mysql_query($query);
			$RS = mysql_fetch_array($result);
		}
		else{
			$error='编号溢出！';
			break;
		}	
	}
	
	if($error=='')//插入入库单
	{
		$query = "insert test_exchange values ('$id', '$date', '$yewuyuan', '$type', '$warehouse', '$warehouse2', '$remark', '$itemstr')";
		$result = mysql_query($query);
	}
	
	//处理货品列表——————
	$list = explode('|',$itemstr);//print_r($list);
	foreach($list as $str){
		$info = explode('+',$str);//print_r($info);die();
		$item_id = $info[0];
		$item_num = $info[1];
		//$item_price = $info[2];
		
		$inout_id = $date2."00";
		$query = "select * from test_inout where id = '$inout_id'";
		$result = mysql_query($query);
		$RS = mysql_fetch_array($result);
		while(!empty($RS)){
			if(($inout_id = next_value($inout_id))!="Overflow!"){//获取可用ID
				$query = "select * from test_inout where id = '$inout_id'";
				$result = mysql_query($query);
				$RS = mysql_fetch_array($result);
			}
			else{
				$error='编号溢出！';
				break;
			}	
		}
		if($error=='')//插入入库记录
		{
			$query = "insert test_inout values ('$inout_id', '$item_id', '$item_num', '0', '$id', '$type')";
			$result = mysql_query($query);
		}
		
		$query = "select * from table_warehouse_$warehouse where id = '$item_id'";//更改仓库中相应货品数量
		$result = mysql_query($query );
		$RS = mysql_fetch_array($result);
		if(empty($RS)){//如果该仓库中之前没有此货品，则插入项目；否则更新项目
			$query = "insert table_warehouse_$warehouse values('$item_id' , $item_num )";echo "<br>".$query."<br>";
			mysql_query($query);
		}
		else{
			$RS[num] -= $item_num;
			//$item_num = $RS[num] - $item_num;
			$query = "update table_warehouse_$warehouse set num = $RS[num] where id = '$item_id'";echo "<br>".$query."<br>";
			mysql_query($query);
		}
		
		$query = "select * from table_warehouse_$warehouse2 where id = '$item_id'";//更改仓库中相应货品数量
		$result = mysql_query($query );
		$RS = mysql_fetch_array($result);
		if(empty($RS)){//如果该仓库中之前没有此货品，则插入项目；否则更新项目
			$query = "insert table_warehouse_$warehouse2 values('$item_id' , $item_num )";echo "<br>".$query."<br>";
			mysql_query($query);
		}
		else{
			$RS[num] += $item_num;
			//$item_num += $RS[num];
			$query = "update table_warehouse_$warehouse2 set num = $RS[num] where id = '$item_id'";echo "<br>".$query."<br>";
			mysql_query($query);
		}//die();
	}
	
//	for($i=0;$i<$list.length;$i++){
//		$info = explode('+',$list[$i]);
//		$item_id = $info[0];
//		$item_num = $info[1];
//		$item_price = $info[2];
//		if(($result = mysql_query("select * from table_warehouse_$warehouse where id = '$item_id'"))==true){
//			$RS = mysql_fetch_array($result);
//			$item_num += $RS[num];
//			mysql_query("insert table_warehouse_$warehouse values('$item_id' , $item_num , $item_price)");
//		}
//	}
	mysql_close();
}

echo '<script language="javascript">';
echo 'var url;';

if($error=='')
{
	if($result == FALSE){
		echo "alert('添加失败！');";
		echo "var url = 'receipt_exchange.php';";
	}
	else{
		echo "alert('添加成功！');\n";
		echo "var url = 'receipt_exchange.php';";
	}
}
else
{
	echo "alert('$error');";
	echo "var url = 'receipt_exchange.php';";
}

echo 'location.href=url;';
echo '</script>'
?>