<?php

function C($name,$method){
	//$cudir = dirname(__FILE__);
	require_once ('/libs/Controller/'.$name.'Controller.class.php');
	//$testController=new testController();
	//$testController->show();
	eval('$obj= new '.$name.'Controller();$obj->'.$method.'();');
}
function M($name){
	require_once ('./libs/Model/'.$name.'Model.class.php');
	eval('$obj= new '.$name.'Model();');
	return $obj;
}
function V($name){
	require_once ('/libs/View/'.$name.'View.class.php');
	eval('$obj=new '.$name.'View();');
	return $obj;
}
function daddslashes($str){//魔法函数为从getpost cookie等处得到的函数转意为合法的
	return (!get_magic_quotes_gpc())?addslashes($str):$str;
}
function ORG($path,$name,$params=array()){//path 是路径 name是第三方类库的名称，params是该类库初始化时需要指定，赋值的属性
	require_once ('./libs/ORG/'.$path.$name.'.class.php');
	$obj=new $name();
	if(!empty($params)){
		foreach($params as $key=>$value){
			$obj->$key=$value;
		}
	}
	return $obj;

}