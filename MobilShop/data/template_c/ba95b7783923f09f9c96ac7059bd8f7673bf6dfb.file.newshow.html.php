<?php /* Smarty version Smarty-3.0.6, created on 2016-03-14 18:02:45
         compiled from "tpl\index/newshow.html" */ ?>
<?php /*%%SmartyHeaderCode:360356e68c45d02848-93299156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba95b7783923f09f9c96ac7059bd8f7673bf6dfb' => 
    array (
      0 => 'tpl\\index/newshow.html',
      1 => 1457949737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '360356e68c45d02848-93299156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<style>
body{
	width:0 auto;
	background-color: #CCC;
}
.top{
	height:100px;
}
.left{
	width:70%;
	border: 1px;
	float: left;
}
.right{
	width:30%;
	border: 1px;
	float:right;
}
</style>
<body>
	<div class="top">搜索区</div>
	<div class="conter">
        <div class="left">
        	<h1>信息区</h1>
        	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('date')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
        	标题：<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</br>
        	发表时间：<?php echo $_smarty_tpl->tpl_vars['item']->value['dateline'];?>

        	作者：<?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>

        	<hr></br>
        	内容：<?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

        	</br>

        	<?php }} ?>
        </div>
        <div class="right">
        	<p>关于我们</p>
        	<?php echo $_smarty_tpl->getVariable('about')->value;?>

        </div>
	</div>
</body>