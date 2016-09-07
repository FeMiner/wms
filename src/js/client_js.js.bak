// JavaScript Document
//检测登录界面
function chk_lg(){
	if(document.login.username.value == ""){
		alert("账号不能为空");
		document.login.username.focus();
		return false;
	}
	if(document.login.pwd.value == ""){
		alert("密码不能为空");
		document.login.pwd.focus();
		return false;
	}
}
//动态菜单
function clickHandler() {
  var targetId, srcElement, targetElement;
  srcElement = window.event.srcElement;
  if (srcElement.className == "Outline") {
     targetId = srcElement.id + "details"; 
	 imgid = srcElement.id + "img";
     targetElement = document.all(targetId);
     if (targetElement.style.display == "none") {
	 	document[imgid].src = "images/jian.gif";
        targetElement.style.display = "";
     } else {
	 	document[imgid].src = "images/jia.gif";
        targetElement.style.display = "none";
     }
  }
}
//添加制度
function add_rule(){
	if(document.r_add.u_title.value == ""){
		alert("标题不能为空");
		return false;
	}
	if(document.r_add.u_content.value == ""){
		alert("内容不能为空");
		return false;
	}
}
//优秀员工
function glist(){
	var len = document.form1.right.length;
	var list = "";
	if((form1.s_fdate.value == "") && (form1.s_ldate.value == "")){
		alert("日期不能为空");
		return false;
	}
	for(var i = 0; i < len; i++){
		list += document.form1.right[i].text + ",";
	}
	form1.g_list.value = list;
}
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
 //添加公告
 function add_mess(){
	if(document.addmess.p_title.value == ""){
		alert("标题不能为空");
		return false;
	}
	if(document.addmess.p_content.value == ""){
		alert("内容不能为空");
		return false;
	}
}
function del_mess(){
	if(confirm('确认要删除吗？'))
		return true;
	else
		return false;
}
//添加意见
function add_lyb(){
	if(document.lyb.l_title.value==""){
		alert("主题不能为空");
		return false;
	}
	if(document.lyb.l_content.value==""){
		alert("内容不能为空");
		return false;
	}
}
//回复意见
function re_back(){
	if(document.tback.r_back.value==""){
		alert("内容不能为空");
		return false;
	}
}