<?php
include "../basic/include.php";
include "../basic/database.php";

$warehouse = $_GET[warehouse];	

//设置查询仓库的默认值
if($warehouse=='')
	$warehouse='0000';
//获取仓库中的货品库存信息
$query = "select * from table_warehouse_$warehouse order by id asc";//die($query);
$result_item = mysql_query($query);

$i = 0;
while($RS = mysql_fetch_array($result_item)){
	$data[$i] = $RS[num];
	$query = "select * from tb_product where encode = '$RS[id]'";
	$result_iteminfo = mysql_query($query);
	$RS2 = mysql_fetch_array($result_iteminfo);
	$name[$i] = $RS2[name];
	
	$targ[$i] = "inquire_storage_item.php?itemid=".$RS[id];
	$alts[$i] = "val=%d";
	$i++;
}
$title = "仓库库存比例概览";

include_once ("jpgraph/jpgraph.php");
include_once ("jpgraph/jpgraph_pie.php");
include_once ("jpgraph/jpgraph_pie3d.php");			//引用3D饼图PiePlot3D对象所在的类文件

//$data = array(266036,295621,335851,254256,254254,685425);			//定义数组
$graph = new PieGraph(600,300,'auto');				//创建画布
$graph->SetShadow();								//设置画布阴影

$graph->title->Set($title);			//创建标题
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);			//设置标题字体
$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL);			//设置图例字体

$p1 = new PiePlot3D($data);							//创建3D饼形图对象
$p1->SetLegends($name);
//$targ=array("pie3d_csimex1.php?v=1","pie3d_csimex1.php?v=2","pie3d_csimex1.php?v=3",
//			"pie3d_csimex1.php?v=4","pie3d_csimex1.php?v=5","pie3d_csimex1.php?v=6");
//$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$p1->SetCSIMTargets($targ,$alts);

$p1->SetCenter(0.4,0.5);					//设置饼形图所在画布的位置
$graph->Add($p1);							//将3D饼图形添加到图像中
$graph->StrokeCSIM();						//输出图像到浏览器

?>

