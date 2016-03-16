<?php
class VIEW{
	public static $view;
	public static function init($viewtype,$config){
		self::$view=new $viewtype;
		foreach($config as $key=>$value){
			self::$view->$key=$value;
		}
	}
	public static function assign($date){
		foreach($date as $key=>$value){
			self::$view->assign($key,$value);
		}
	}
	public static function display($template){
		self::$view->display($template);
	}
		
}