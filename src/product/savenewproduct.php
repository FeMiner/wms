<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
include("../conn/conn.php");
if(is_numeric($_POST[upperlimit])==false || is_numeric($_POST[lowerlimit])==false)
 {
   echo "<script>alert('库存只能为数字！');history.back();</script>";
   exit;
 }
if(is_numeric($_POST[inprice])==false || is_numeric($_POST[outprice])==false)
 {
   echo "<script>alert('价格只能为数字！');history.back();</script>";
   exit;
 }
 
$temptype=explode("|",$_POST[typeid]);
$maintype=$temptype[1];
$subtype=$_POST[stype];
$name=$_POST[name];
$encode=$_POST[encode];
$barcode=$_POST[barcode];
$size=$_POST[size];
$unit=$_POST[unit];
$upperlimit=$_POST[upperlimit];
$lowerlimit=$_POST[lowerlimit];
$inprice=$_POST[inprice];
$outprice=$_POST[outprice];
$upfile=$_POST[upfile];
$flag=$_GET[flag];
$id=$_GET[id];

echo $upfile;
if($flag==1)
{
  $sql=mysql_query("select * from tb_product where encode='".$encode."'",$conn);
  $info=mysql_fetch_array($sql);
  if($info==true)
  {
      echo "<script>alert('该该货品编号已经存在!');history.back();</script>";
      exit;
   }
 }



function getname($exname){
   $dir = "upimages/";
   $i=1;
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   
   while(true){
       if(!is_file($dir.$i.".".$exname)){
	       $name=$i.".".$exname;
	       break;
	   }
	   $i++;
	 }

   return $dir.$name;
}

$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
$uploadfile = getname($exname);

move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))
 { 
  $uploadfile="product/".$uploadfile;
}
else
 {
  $uploadfile="";
 }

$jianjie=$_POST[jianjie];
$addtime=date("Y-m-d");
if($flag==1)
{

   mysql_query("insert into     tb_product(maintype,subtype,name,encode,barcode,size,unit,upperlimit,lowerlimit,inprice,outprice,tupian,jianjie,addtime)values('$maintype','$subtype','$name','$encode','$barcode','$size','$unit','$upperlimit','$lowerlimit','$inprice','$outprice','$uploadfile','$jianjie','$addtime')",$conn);
echo "<script>alert('货品".$name."添加成功!');window.location.href='addproduct.php';</script>";
}

if($flag==0)
{

  if($uploadfile=="")
  {
        mysql_query("update tb_product set   maintype='$maintype',subtype='$subtype',name='$name',encode='$encode',barcode='$barcode',size='$size',unit='$unit',upperlimit='$upperlimit',lowerlimit='$lowerlimit',inprice='$inprice',outprice='$outprice',jianjie='$jianjie' where id=".$_GET[id]."",$conn);
  
  }
  else
  {
    mysql_query("update tb_product set maintype='$maintype',subtype='$subtype',name='$name',encode='$encode',barcode='$barcode',size='$size',unit='$unit',upperlimit='$upperlimit',lowerlimit='$lowerlimit',inprice='$inprice',outprice='$outprice',tupian='$uploadfile',jianjie='$jianjie' where id=".$_GET[id]."",$conn);

}
echo "<script>alert('货品".$name."修改成功!');window.location.href='showproduct.php?mtype=1&stype=1';</script>";
}

?>