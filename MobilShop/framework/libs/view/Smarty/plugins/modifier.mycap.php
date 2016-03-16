<?php
function smarty_modifier_mycap($string,$par1){
	//strtoupper()将字母大写
	//strtolower()将字母小写
	
	return strtoupper(substr($string,0,1)).strtolower(substr($string,1)).$par1;
}