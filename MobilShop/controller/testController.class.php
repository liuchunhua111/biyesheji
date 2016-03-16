<?php 
class testController{
	function show(){
		//$testModel=new testModel();
		$testModel=M('test');
		$date=$testModel->get();
		//$testView=new testView();
		$testView=v('test');
		$testView->display($date);
	}
}
