<?php
//url形式 index.php?controller=控制器名&method=放发名
require_once ('./function.php');
//require_once ('./config.php');
$viewconfig = array(
	'left_delimiter'=>'<{',
	'right_delimiter'=>'}>',
	'template_dir'=>'tpl',
	'compile_dir'=>'template_c');
$controllerAllow=array('test','index');
$methodAllow=array('test','index','show');
$controller=in_array($_GET['controller'],$controllerAllow)?daddslashes($_GET['controller']):'index';

$method=in_array($_GET['method'],$methodAllow)?daddslashes($_GET['method']):'index';
$view=ORG('Smarty/','Smarty',$viewconfig);
C($controller,$method);
