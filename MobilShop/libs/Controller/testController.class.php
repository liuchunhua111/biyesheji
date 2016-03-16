<?php 
class testController{
	function show(){
		//$testModel=new testModel();
		global $view;
		$testModel=M('test');
		$date=$testModel->get();
		//$testView=new testView();
		$view->assign("str","hello world....");
		$view->display("test.tpl");
		//$testView=v('test');
		//$testView->display($date);
	}
}
