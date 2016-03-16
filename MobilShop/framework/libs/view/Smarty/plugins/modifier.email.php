<?php
	function smarty_modifier_email($str){
		//^打头
		$pattern="/^[a-zA-Z_][a-zA-Z0-9_]*@[a-zA-Z0-9]*+(\.[a-zA-Z0-9]+)+$/i";
		if(preg_match($pattern,$str)){
			return "邮箱格式合法";
		}else{
			return "不合法的邮箱格式";
		}
	}