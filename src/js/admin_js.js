// JavaScript Document
//登录页面验证
function check(){
	if(login.username.value==""){
		alert("请输入用户名!!");
		login.username.focus();
		return false;		
	}
	if(login.pwd.value==""){
		alert("请输入密码!!");
		login.pwd.focus();
		return false;
	}
}
//left下拉菜单
function clickList() {
  var targetId, srcElement, targetElement;
  srcElement = window.event.srcElement;
  if (srcElement.className == "active") {
     targetId = srcElement.id + "other"; 
     targetElement = document.all(targetId);
     if (targetElement.style.display == "none") {
        targetElement.style.display = "";
     } else {
        targetElement.style.display = "none";
     }
  }
}
//添加部门页面验证
function a_check(){
	if(	document.a_depart.d_name.value == ""){
			alert("请输入部门名称");
			document.a_depart.d_name.focus();
			return false;
		}
}
//动态下拉菜单
function ShowTR(objImg,objTr)
{
	if(objTr.style.display == "block")
	{
		objTr.style.display = "none";
		objImg.src="../Images/jia.gif";
		objImg.alt = "展开";		
	}
	else
	{
		objTr.style.display = "block";
		objImg.src="../Images/jian.gif";
		objImg.alt = "折叠";		
	}
}
//删除确认
function cfm(){
	if(confirm('确认要删除部门吗？'))
		return true;
	else
		return false;
}
//职员查询
function chk_null(){
	if(document.found.u_key.value == ""){
	 alert("请是输入关键字");
	 return false;
	} 
}
//删除职员
function del_chk(){
	if(confirm('确认要删除吗？'))
		return true;
	else
		return false;
}
//添加职员信息
function add_check(){
	var das = document.add_staf;
	if(das.u_user.value == ""){
		alert("账号不允许为空");
		return false;
	}
	if(das.u_name.value == ""){
		alert("姓名不允许为空");
		return false;
	}
	if(das.u_pwd.value == ""){
		alert("密码不允许为空");
		return false;
	}
}
//修改员工信息
function mod_check(){
	var das = document.mod_staf;
	if(das.u_user.value == ""){
		alert("账号不允许为空");
		return false;
	}
	if(das.u_name.value == ""){
		alert("姓名不允许为空");
		return false;
	}
}

function glist(){
	var len = document.form1.right.length;
	var list = "";
	if(form1.u_group.value == ""){
		alert("用户组名称不能为空");
		return false;
	}
	for(var i = 0; i < len; i++){
		list += document.form1.right[i].text + ",";
	}
	form1.g_list.value = list;
}
function glist1(){
	var len = document.form1.right.length;
	var list = "";
	for(var i = 0; i < len; i++){
		list += document.form1.right[i].text + ",";
	}
	form1.g_list.value = list;
}

//移动select的部分内容,必须存在value，此函数以value为标准进行移动
function moveSelected(oSourceSel,oTargetSel)
{
     var arrSelValue = new Array();
     var arrSelText = new Array();
     var arrValueTextRelation = new Array();
     var index = 0;
     for(var i=0; i<oSourceSel.options.length; i++)
     {
         if(oSourceSel.options[i].selected)
         {

             arrSelValue[index] = oSourceSel.options[i].value;
             arrSelText[index] = oSourceSel.options[i].text;
             arrValueTextRelation[arrSelValue[index]] = oSourceSel.options[i];
             index ++;
         }
     }
     for(var i=0; i<arrSelText.length; i++)  
     {
         var oOption = document.createElement("option");
         oOption.text = arrSelText[i];
         oOption.value = arrSelValue[i];
         oTargetSel.add(oOption);
         oSourceSel.removeChild(arrValueTextRelation[arrSelValue[i]]);
     }
 }
 //删除
function chk_del(){
	if(confirm("确定要删除选中的项目吗？一旦删除将不能恢复！"))
		return true;
	else
		return false;
}
//修改管理员密码
function mod_chk(){
	var dmp = document.mod_pwd;
	if(dmp.old_pwd.value == "" || dmp.new_pwd.value == "" || dmp.two_pwd.value == ""){
		alert("密码框不允许为空");
		return false;
	}
	if(dmp.new_pwd.value != dmp.two_pwd.value){
		alert("两次密码不一致");
		return false;
	}
}
//删除备份
function del_bak(){
if(confirm("确定要删除备份文件吗？一旦删除将不能恢复！"))
		return true;
	else
		return false;
}
//恢复备份
function re_bak(){
	if(document.rebak.r_name.value == ""){
		alert("暂时没有旧的备份文件");
		return false;
	}
	if(confirm("确定要恢复备份吗？"))
		return true;
	else
		return false;
}