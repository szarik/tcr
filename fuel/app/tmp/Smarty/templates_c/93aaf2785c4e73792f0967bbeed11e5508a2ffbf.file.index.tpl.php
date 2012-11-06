<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 12:36:22
         compiled from "D:\Server\Server\inescms\fuel\app\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12099507190f7b6b9b8-81632170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93aaf2785c4e73792f0967bbeed11e5508a2ffbf' => 
    array (
      0 => 'D:\\Server\\Server\\inescms\\fuel\\app\\views\\default\\index.tpl',
      1 => 1350995780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12099507190f7b6b9b8-81632170',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_507190f7c99a62_36987581',
  'variables' => 
  array (
    'doctype' => 0,
    'assets' => 0,
    'cssie' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507190f7c99a62_36987581')) {function content_507190f7c99a62_36987581($_smarty_tpl) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['doctype']->value)===null||$tmp==='' ? '<!DOCTYPE html>' : $tmp);?>

<html>
<head>
    <meta charset='utf-8'>
    <title>My first page</title>
	<?php echo (($tmp = @$_smarty_tpl->tpl_vars['assets']->value)===null||$tmp==='' ? '' : $tmp);?>
<!--[if IE]>
	<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cssie']->value)===null||$tmp==='' ? '' : $tmp);?>
<![endif]-->

</head>
<body>

	<div class="container">

		<div id="header">

			<div class="row">
				<div class="eightcol">

					 <div id="slogan">

						  logo
					 </div>

				</div>
            <div class="fourcol last">
		         social
            </div>
			</div>

		</div>

	</div>


NOWY
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['body']->value)===null||$tmp==='' ? 'null' : $tmp);?>
 sad s
</body>
</html><?php }} ?>