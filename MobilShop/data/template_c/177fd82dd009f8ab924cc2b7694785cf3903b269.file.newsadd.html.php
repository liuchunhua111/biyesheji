<?php /* Smarty version Smarty-3.0.6, created on 2016-03-04 13:45:54
         compiled from "tpl\admin/newsadd.html" */ ?>
<?php /*%%SmartyHeaderCode:1372256d921129f4d58-93736418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '177fd82dd009f8ab924cc2b7694785cf3903b269' => 
    array (
      0 => 'tpl\\admin/newsadd.html',
      1 => 1457070350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1372256d921129f4d58-93736418',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>
	
	<link rel="stylesheet" href="img/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->
	<script src="img/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="img/js/hideshow.js" type="text/javascript"></script>
	<script src="img/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="img/js/jquery.equalHeight.js"></script>
	<script type="text/javascript" src="img/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="img/js/ckeditor/adapters/jquery.js"></script>
	<script type="text/javascript">
	// $(document).ready(function(){
	// 	$('#content').ckeditor();
	// }
	 window.onload = function()
    {
        CKEDITOR.replace('content');
    };
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">后台管理面板</a></h1>
			<h2 class="section_title"></h2><div class="btn_view_site"><a href="index.php">查看网站</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="admin.php？controller=admin">后台管理系统</a> <div class="breadcrumb_divider"></div> <a class="current">文章发布</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<?php $_template = new Smarty_Internal_Template('admin/leftmenu.html', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	
	<section id="main" class="column">
		<form id="form1" name="form1" method="post" action="admin.php?controller=admin&method=newsadd">
			<article class="module width_full">
				<header><h3>发表新文章</h3></header>
					<div class="module_content">
							<fieldset>
								<label>标题</label>
								<input type="text" name="title" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('date')->value['title'])===null||$tmp==='' ? '' : $tmp);?>
">
							</fieldset>
							<fieldset>
								<label>内容</label>
							</br>
							</br>
								<textarea id="content" rows="12" name="content"><?php echo (($tmp = @$_smarty_tpl->getVariable('date')->value['content'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
							</fieldset>
							<fieldset style="width:48%; float:left; margin-right: 3%;">
								<label>作者</label>
								<input type="text" name="author" style="width:92%;" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('date')->value['author'])===null||$tmp==='' ? '' : $tmp);?>
">
							</fieldset>
							<fieldset style="width:48%; float:left;">
								<label>出处</label>
								<input type="text" name="start" style="width:92%;" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('date')->value['start'])===null||$tmp==='' ? '' : $tmp);?>
">
							</fieldset><div class="clear"></div>
					</div>
				<footer>
					<div class="submit_link">
						<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('data')->value['id'])===null||$tmp==='' ? '' : $tmp);?>
">
						<input type="submit" name="submit" value="发布" class="alt_btn">
					</div>
				</footer>
			</article>
		</form>
		<div class="spacer"></div>
	</section>


</body>

</html>