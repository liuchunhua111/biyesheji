<?php
header("content-type:text/html;charset=utf8");
session_start();
require_once ('config.php');
require_once ('framework/pc.php');
require_once ('page.class.php');
PC::run($config);
?>