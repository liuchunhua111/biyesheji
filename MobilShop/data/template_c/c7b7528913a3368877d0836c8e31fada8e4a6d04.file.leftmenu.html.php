<?php /* Smarty version Smarty-3.0.6, created on 2016-03-03 13:57:53
         compiled from "tpl\admin/leftmenu.html" */ ?>
<?php /*%%SmartyHeaderCode:884856d7d2617b6836-78594319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7b7528913a3368877d0836c8e31fada8e4a6d04' => 
    array (
      0 => 'tpl\\admin/leftmenu.html',
      1 => 1456984669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '884856d7d2617b6836-78594319',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="admin.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="admin.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="admin.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar -->