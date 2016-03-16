<?php
header('content-type:text/html;charset=utf8');
require_once ('framework/pc.php');
require_once ('config.php');
date_default_timezone_set('Asia/Shanghai');
PC::run($config);
