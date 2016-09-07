<?php

function next_value($value)
{
	$str='0123456789';
	for($i=0; $i<strlen($value); $i++){
		$current_key[$i]=strrpos($str, $value[$i]);//保存字符串每一位在str中的位置
	}
 
	$len=strlen($str)-1;
	for($i=strlen($value)-1; $i>=0; $i--){
		$i==strlen($value)-1 && $current_key[$i]++;
		if($current_key[$i]>$len){
			$current_key[$i]=0;
			$current_key[$i-1]++;
		}
	}
 
	if(count($current_key)>strlen($value)){
		return "Overflow!";
	}
 
	$v='';
	for($i=0; $i<strlen($value); $i++){
		$v.=$str[$current_key[$i]];
	}
	return $v;
}

?>