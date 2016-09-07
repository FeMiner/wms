<?php
  include("../const.php");
  include "../conn/conn.php";
   
 /* if ($authority[0]==0)
 {  
      echo "<script language='javascript'>alert('对不起，你没有此操作权限！');history.back();</script>";
      exit;
  }*/
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=gbk" />
<title>货品出库</title>
<link href="../style/style.css" rel="stylesheet" type="text/css">
<style>
body {
	background-color:#FFFFFF;
}
</style>
<script type="text/javascript" src="../js/mootools.js"></script>
<script type="text/javascript" src="../js/calendar.rc4.js"></script>
<script type="text/javascript">		
	//<![CDATA[
		window.addEvent('domready', function() { 
			myCal1 = new Calendar({ date1: 'd-m-Y' }, { direction: 1, tweak: {x: 6, y: 0} });
			myCal2 = new Calendar({ date2: 'd/m/Y' }, { classes: ['dashboard'], direction: 1, tweak: {x: 3, y: -3} });
			myCal3 = new Calendar({ date3: 'd/m/Y' }, { classes: ['i-heart-ny'], direction: 1, tweak: {x: 3, y: 0} });
		});
	//]]>
	</script>
<link rel="stylesheet" type="text/css" href="../css/iframe.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/calendar.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/dashboard.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/i-heart-ny.css" media="screen" />
</head>
<body>
<form action="" method="get">
  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left"><fieldset>
    <legend>出库信息</legend>
    <label for="date1">出库日期</label>
    <input id="date1" name="date1" type="text" />
	<label>发货仓库</label>
    <input id="warehouse" name="warehouse" type="text" />
    <label>出库类型</label>
	       <p>
	         <?php
			$sql=mysql_query("select * from tb_inout where type='".出库."' order by id asc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "请先添加出库类型!";
			}
			else
			{
			?>
	         <select name="typeid" class="inputcss" >
	           <?php
			do
			{
			?>
	           <option value=<?php echo $info[id];?>><?php echo $info[name];?></option>
               <?php
			}
			while($info=mysql_fetch_array($sql));
			?>  
             </select>
	         <?php  }?>
             </label>
      </fieldset></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>