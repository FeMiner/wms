<?php
  include("../const.php");
  include "../conn/conn.php";
   
 /* if ($authority[0]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }*/
?>
<?php   
//   $con = mysql_connect("localhost","root","hust"); //or die("不能连接到Mysql Server");
//	mysql_select_db("db_wms", $con); //or die("数据库选择失败");
//	mysql_query("set names gb2312 ");
	
	$query = "select * from table_itemclassify order by name";//echo $query."<br>";
	$result = mysql_query($query);

	mysql_close();	 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style type="text/css">
<!--
.STYLE1 {font-size: 18px}
-->
</style>
</head>
<script src="../js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script language="javascript">

$("input[type=text][imemode=disabled]").live("click", this, function () {/*控制光标在最后*/

var curVal = $(this).val();

var ran = this.createTextRange();

ran.moveStart('character', curVal.length);

ran.collapse(true);

ran.select();

}).live("keydown", this, function (event) {/*禁用方向键 Home End PgUp PgDn*/

if (event.keyCode >= 33 && event.keyCode <= 40) {

return false;

}

return true;

}).live("keypress", this, function (event) {

var curVal = $(this).val();

if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46) {

if (curVal.indexOf(".") != -1 && event.keyCode == 46) return false; /*控制只能输入一个小数点*/

if (curVal == "0" && event.keyCode != 46) { $(this).val(""); return true; } /*控制第一位是0时 输入数字后将0删掉*/

if (curVal == "0" && event.keyCode != 46) return false; /*控制第一位输入0其后必须是小数点*/

if (curVal == "" && event.keyCode == 46) $(this).val("0"); /*第一位输入小数点 将前一位补0*/

} else return false;

}).live("paste", function () {/*禁止粘贴非数值*/

return !clipboardData.getData('text').match(/^\D+(\.\D+)?$/)

}).live("dragenter", function () {/*禁止拖入*/

return false;

});






function chkinput(form1)
	{
	var upperlimit;
	var lowerlimit;
	  if(form1.name.value=="")
	   {
	     alert("请输入货品名称!");
		 form1.name.select();
		 return(false);
	   }
	  
	  if(form1.encode.value=="")
	   {
	     alert("请输入货品编码!");
		 form1.encode.select();
		 return(false);
	   }
	  
	
	
	  if(form1.barcode.value=="")
	   {
	     alert("请输入货品条码!");
		 form1.barcode.select();
		 return(false);
	   }
	   
	   upperlimit=Number(form1.upperlimit.value);
	   lowerlimit=Number(form1.lowerlimit.value);
	  if(upperlimit<lowerlimit)
	  {
	      alert("库存上限不能低于库存下限!");
		  form1.upperlimit.select();
		  return(false);
	  }
	
	   return(true);
	}

//移除右边所有的选项
function removeAllOption(){
	var right = document.getElementById("right");
	for(;right.length!=0;)
		right.remove(right.options[0]);
}
//根据选中的选项显示右边的选项
function showOption(){
	removeAllOption();
	var left = document.getElementById("left");
	var right = document.getElementById("right");
	
	var option_str = "";
	if(left.selectedIndex != -1)
		var option_str = left.options[left.selectedIndex].value;
		
	var option_list = option_str.split("|");
	var y;
	
	for (i=2;i<option_list.length;i++){
		y = document.createElement('option');
		y.text = option_list[i];
		y.value = option_list[i];
		right.add(y);//right.appendChild(y,null);
	}
}
//由左边选项改变所引起的变化
function changeLeft(){
	//var rename = document.getElementById("rename");
	//var left = document.getElementById("left");
	//rename.value = left.options[left.selectedIndex].text;
	showOption();
	//alert("changeLeft() runing!");
}
</script>
<body>
<form id="form1" name="form1"enctype="multipart/form-data" method="post" action="savenewproduct.php?flag=1" onSubmit="return chkinput(this)">
  <table width="800" border="0" align="center" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF">
    <tr>
      <td colspan="4" align="center" bgcolor="#0000CC"><span class="STYLE1">货品添加</span></td>
    </tr>
    <tr>
      <td align="right">货品主类别:</td>
      <td><label>
        <select id="left" name="typeid" onChange="changeLeft()">
		<OPTION value="">--请选择--</OPTION> 
		<?php while($RS=mysql_fetch_array($result)) echo "<option value='$RS[id]|$RS[name]$RS[lowerclass]'>$RS[name]</option>";?>
        </select>
        </label></td>
      <td align="center">货品子类别：</td>
      <td><label>
        <select id="right" name="stype" >

		<script language="javascript">showOption();</script>

        </select>
        </label></td>
    </tr>
    <tr>
      <td align="right">货品名称:</td>
      <td><label>
        <input type="text" name="name" />
        </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="right">货品编码:</td>
      <td><input type="text" name="encode" /></td>
      <td align="center"><label>货品条码:</label></td>
      <td><input type="text" name="barcode" /></td>
    </tr>
    <tr>
      <td align="right">规格型号:</td>
      <td><input type="text" name="size" /></td>
      <td align="center">计量单位:</td>
      <td><label>
        <?php
			$sql=mysql_query("select * from table_measureunit order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "请先添加计量单位!";
			}
			else
			{
			?>
            <select name="unit" class="inputcss">
			  <OPTION>--请选择--</OPTION> 
			<?php
			do
			{
			?>
              <option value=<?php echo $info[name];?>><?php echo $info[name];?></option>
			<?php
			}
			while($info=mysql_fetch_array($sql));
			?>  
            </select>
            <?php
		     }
		    ?>
      </label></td>
    </tr>
    <tr>
      <td align="right">库存上限:</td>
      <td><input type="text" name="upperlimit" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
      <td align="center">库存下限:</td>
      <td><input type="text" name="lowerlimit" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></td>
    </tr>
    <tr>
      <td align="right">入库参考价:</td>
      <td><input type="text" name="inprice" style="ime-mode: disabled" imemode="disabled" /></td>
      <td align="center">出库参考价:</td>
      <td><input type="text" name="outprice" style="ime-mode: disabled" imemode="disabled" /></td>
    </tr>
    <tr>
      <td align="right">商品图片:</td>
      <td colspan="3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <input type="file" name="upfile" class="inputcss" size="30" /></td>
    </tr>
    <tr>
      <td align="right">货品简介：</td>
      <td colspan="3"><textarea name="jianjie" cols="80" rows="8" class="inputcss"></textarea></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><input name="submit" type="submit" class="btn2" id="submit" value="添加" />
        &nbsp;&nbsp;
        <input name="reset" type="reset" class="btn_2k3" value="取消" /></td>
    </tr>
  </table>
</form>
</body>
</html>
