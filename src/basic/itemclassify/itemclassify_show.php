<?php
//权限验证——
include("../../const.php");
if ($authority[5]==0){  
	echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
	exit;
}
//权限验证——

	include "../include.php";
	include "../database.php";
	
	$query="select * from table_itemclassify order by name";//echo $query."<br>";
	$result = mysql_query($query);

	mysql_close();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>货品分类管理</title>
</head>
<script type="text/javascript"> 
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
		right.add(y);//right.appendChild(y,null);
	}
}
function checkClassName(){
	var rename = document.getElementById("rename").value;
	var left = document.getElementById("left");
	
	var error;
	for(var i=0;i<left.length;i++){
		if(left.options[i].text==rename && i!=left.selectedIndex){
			alert("已存在重复的选项！");
			document.getElementById("rename").value = left.options[left.selectedIndex].text;
			error=1;
			return false;
		}
	}
	return true;
}
//当右边选项发生增减时，改变左边选中的选项的Value
function changeValue(){
	var right = document.getElementById("right");
	var str = "";
	for(i=0;i<right.length;i++)
		if(right.options[i]!=''){
			str+="|";
			str+=right.options[i].text;
		}
	//alert("changeValue(): str = "+str);
	var rename = document.getElementById("rename").value;
	
	var left = document.getElementById("left");
	
	var option_str = "";
	if(left.selectedIndex != -1)
		option_str = left.options[left.selectedIndex].value;
	var option_list = option_str.split("|");
	left.options[left.selectedIndex].value = option_list[0]+"|"+rename+str;
	
	var hidden = document.getElementById("hidden").value = left.options[left.selectedIndex].value;
	document.getElementById('left').disabled=true;
	document.getElementById('new').disabled=true;
	document.getElementById('add').disabled=true;
	document.getElementById('submit').disabled=false;
	
	//alert("changeValue(): value = "+left.options[left.selectedIndex].value);
}
//删除左边选中的选项，完成页面跳转
function deleteOptionLeft(){
	var left = document.getElementById("left");
	var url = "";
	if(left.selectedIndex != -1){
		var option_str = left.options[left.selectedIndex].value;
		var option_list = option_str.split("|");
		url = "../sql_delete_bg.php?db=itemclassify&id="+option_list[0];
		if(confirm("确认删除？")==true)
		location.href = url;
	}
	//alert("deleteOptionLeft() runing!");
		
}
//删除右边选中的选项，改变左边选中的option的Value
function deleteOptionRight(){
	var right = document.getElementById("right");
	right.remove(right.selectedIndex);
	changeValue();
}
//由左边选项改变所引起的变化
function changeLeft(){
	var rename = document.getElementById("rename");
	var left = document.getElementById("left");
	rename.value = left.options[left.selectedIndex].text;
	showOption();
	//alert("changeLeft() runing!");
}
//添加右边选项  (可添加判断选项是否重复的判定)
function insertOption(){
	var y = document.createElement('option');
	y.text = document.getElementById("optiontext").value;
	var right = document.getElementById("right");
	
	var error;
	for(var i=0;i<right.length;i++){
		if(right.options[i].text==y.text){
			alert("已存在重复的选项！");
			error=1;
			break;
		}
	}
	if(error!=1){
		right.add(y); // standards compliant/ IE
		changeValue();
	}
}
function checkForm(){
	alert("checkForm() runing!");
}
//将选中的右边选项上移
function upOption(){
	var right = document.getElementById('right');
	var text;
	if(right.selectedIndex!=-1&&right.selectedIndex!=0){
		text = right.options[right.selectedIndex].text;
		right.options[right.selectedIndex].text = right.options[right.selectedIndex-1].text;
		right.options[right.selectedIndex-1].text = text;
		right.selectedIndex-=1;
		changeValue()
	}
	//alert("upOption() runing!");
}
//将选中的右边选项下移
function downOption(){
	var right = document.getElementById('right');
	var text;
	if(right.selectedIndex!=-1&&right.selectedIndex!=right.length-1){
		text = right.options[right.selectedIndex].text;
		right.options[right.selectedIndex].text = right.options[right.selectedIndex+1].text;
		right.options[right.selectedIndex+1].text = text;
		right.selectedIndex+=1;
		changeValue()
	}
	//alert("downOption() runing!");
}
//添加新的分类
function addNewClass(){
	if(document.getElementById('new').value!=''){
		var url = 'itemclassify_add_bg.php?name='+document.getElementById('new').value;
		location.href=url;
	}
	//alert("addNewClass() runing!");
}
</script>
<body>
<h3>货品分类（大类、小类）管理</h3>
<form name="item_classify" id="item_classify" method="post" action="itemclassify_modify_bg.php" >
  <input name="hidden" id="hidden" type="hidden" >
  <table border="1" align="left" cellpadding="5" cellspacing="0" bordercolor="#CCCCFF">
    <tr>
      <td valign="top">大类：</td>
      <td><select name="left" size="10" id="left" onChange="changeLeft()" ondblclick="deleteOptionLeft()">
          <!--IE不支持-->
          <?php 
while($RS=mysql_fetch_array($result))
	echo "<option value='$RS[id]|$RS[name]$RS[lowerclass]'>$RS[name]</option>";
?>
        </select>
      </td>
      <td><input id="new" name="new" type="text" size="5">
        <input name="add" type="button" id="add" onClick="addNewClass()" value="添加" size="5">
        <p>
          <input id="rename" name="rename" type="text" size="5" onChange="if(checkClassName()==true) changeValue();">
        </p></td>
      <td valign="top">小类：</td>
      <td><select name="right" size="10" id="right" ondblclick="deleteOptionRight()">
          <!--IE不支持-->
          <script language="javascript">showOption();</script>
        </select>
      </td>
      <td><p>
          <input type="button" name="up" value="∧" onClick="upOption()">
        </p>
        <p>
          <input id="optiontext" name="optiontext" type="text" size="5" />
          <input name="add" type="button" id="add" value="添加" onClick="insertOption()"/>
        </p>
        <p>
          <input type="button" name="down" value="∨" onClick="downOption()">
        </p></td>
    </tr>
    <tr>
      <td></td>
      <td><input name="delete_left" type="button" value="删除" onClick="deleteOptionLeft()"></td>
      <td></td>
      <td></td>
      <td><input name="delete_right" type="button" value="删除" onClick="deleteOptionRight()"></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input id="submit" type="submit" value="提交" disabled />
        <input id="reset" type="button" value="重置" onClick="location.reload(true)" /></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</form>
</body>
