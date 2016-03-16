<?php /* Smarty version Smarty-3.0.6, created on 2016-03-16 11:15:17
         compiled from "tpl\index/cate.html" */ ?>
<?php /*%%SmartyHeaderCode:1798556e8cfc56a2cc0-49500086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ae52e352febbbbf5d90b8b4d8aec3e094846d0c' => 
    array (
      0 => 'tpl\\index/cate.html',
      1 => 1458098111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1798556e8cfc56a2cc0-49500086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form action="#" method="post">
	<select name="v">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('date')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

			<option selected="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</option>
		<?php }} ?>

	</select>
</form>
