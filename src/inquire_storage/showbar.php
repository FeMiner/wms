<?php
include "../basic/include.php";
include "../basic/database.php";

$itemid = $_GET[itemid];		
$flag = '';
if($itemid=='')
	$flag = 'none';

if($flag == ''){//获取仓库信息
	$query = "select * from table_warehouse order by id";//echo $query."<br>";
	$result_warehouse = mysql_query($query);
	$x_length = mysql_num_rows($result_warehouse);
}

if($flag == ''){//获取货品信息
	$query = "select * from tb_product where encode = '$itemid'";//echo $query."<br>";
	$result_iteminfo = mysql_query($query);	
}
$RS = mysql_fetch_array($result_iteminfo);
$title = "$RS[encode]-$RS[name]-库存统计";

include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_bar.php");

//$datay=array(160,180,203,289,405,488,489,408,299,166,187,105);

$i = 0;
while($RS = mysql_fetch_array($result_warehouse)){
	$aix_x[$i] = $RS[name];
	
	$query = "select * from table_warehouse_$RS[id] where id = '$itemid'";//echo $query."<br>";
	$result_storage = mysql_query($query);
	$RS2 = mysql_fetch_array($result_storage);
	if(empty($RS2))
		$aix_y[$i] = 0;
	else
		$aix_y[$i] = $RS2[num];
	
	$i++;
	$sum += $RS2[num];
}

//print_r($aix_x);
//print_r($aix_y);
//die('\n end \n');

//创建画布
$graph = new Graph(600,300,"auto");	
$graph->SetScale("textlin");
$graph->yaxis->scale->SetGrace(20);

//创建画布阴影
$graph->SetShadow();

//设置显示区左、右、上、下距边线的距离，单位为像素
$graph->img->SetMargin(40,30,30,40);

//创建一个矩形的对象
$bplot = new BarPlot($aix_y);

//设置柱形图的颜色
$bplot->SetFillColor('orange');	
//设置显示数字	
$bplot->value->Show();
//在柱形图中显示格式化的图书销量
$bplot->value->SetFormat('%d');
//将柱形图添加到图像中
$graph->Add($bplot);

//设置画布背景色为淡蓝色
$graph->SetMarginColor("lightblue");

//创建标题
$graph->title->Set($title);

//设置X坐标轴文字
//$a=array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");
$graph->xaxis->SetTickLabels($aix_x); 

//设置字体
$graph->title->SetFont(FF_SIMSUN);
$graph->xaxis->SetFont(FF_SIMSUN); 

//输出矩形图表
$graph->Stroke();
?>

