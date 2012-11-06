<?php /* Smarty version Smarty-3.1.11, created on 2012-11-05 13:06:56
         compiled from "E:\server\tcr\dev\fuel\app\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3179150979c861661f5-99918215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b5b28f227b8d6f421d063badff27a070bd49746' => 
    array (
      0 => 'E:\\server\\tcr\\dev\\fuel\\app\\views\\default\\index.tpl',
      1 => 1352120805,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3179150979c861661f5-99918215',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50979c86268926_11149830',
  'variables' => 
  array (
    'config' => 0,
    'doctype' => 0,
    'title' => 0,
    'assets' => 0,
    'assets_external' => 0,
    'cssie' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50979c86268926_11149830')) {function content_50979c86268926_11149830($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['config']->value['theme_show_comments'])&&$_smarty_tpl->tpl_vars['config']->value['theme_show_comments']==1){?> <!-- index.tpl start --> <?php }?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['doctype']->value)===null||$tmp==='' ? '<!DOCTYPE html>' : $tmp);?>

<html>
<head>
    <meta charset='utf-8'>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? 'Imprezy Wrocław, Wydarzenia Wrocław' : $tmp);?>
 - To co robimy.pl?</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['assets']->value)===null||$tmp==='' ? '' : $tmp);?>
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['assets_external']->value)===null||$tmp==='' ? '' : $tmp);?>
<!--[if IE]>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['cssie']->value)===null||$tmp==='' ? '' : $tmp);?>
<![endif]-->

</head>
<body onload="mapaStart()">

<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['theme']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>




<div class="container">

    <div class="row-fluid">
        <div class="span3">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['theme']->value)."/sidebar_nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

        <div class="span9">
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['theme']->value)."/tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>

    </div>
</div>


</body>
</html>
<?php if (isset($_smarty_tpl->tpl_vars['config']->value['theme_show_comments'])&&$_smarty_tpl->tpl_vars['config']->value['theme_show_comments']==1){?> <!-- index.tpl end --> <?php }?><?php }} ?>