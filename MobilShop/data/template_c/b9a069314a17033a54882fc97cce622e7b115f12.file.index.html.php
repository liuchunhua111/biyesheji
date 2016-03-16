<?php /* Smarty version Smarty-3.0.6, created on 2016-03-15 15:12:30
         compiled from "tpl\index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1649356e7b5de1606e8-55999497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9a069314a17033a54882fc97cce622e7b115f12' => 
    array (
      0 => 'tpl\\index/index.html',
      1 => 1458025944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1649356e7b5de1606e8-55999497',
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
        text-align: center;
        padding-top: 50px;
        font-weight: blod;
        font-size: 20px;
}
.top input{
        height:50px;
}
.top input.content{
         width: 500px;
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
    <div class="top">
        <form action="index.php?controller=index&method=index" method="post">
            文章标题<input type="text" name="keywords" class="content">
            <input type="submit" value="搜索">
        </form>

    </div>
    <div class="conter">
    <div class="left">
        <h1>信息区</h1>
        <?php if (is_array($_smarty_tpl->getVariable('news')->value)){?>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('news')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
         <a href="index.php?controller=index&method=newshow&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">标题：<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a></br>
        发表时间：<?php echo $_smarty_tpl->tpl_vars['item']->value['dateline'];?>

        作者：<?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>

        <hr></br>
        内容：<?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

        </br>
        <?php }} ?>
        <?php }else{ ?>
        <p>对不起，没有您要查找的新闻</p>
        <?php }?>
        
    </div>
    <div class="right">
        <p>关于我们</p>
        <?php echo $_smarty_tpl->getVariable('about')->value;?>

    </div>
    </div>
</body>