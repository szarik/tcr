<?php /* Smarty version Smarty-3.1.11, created on 2012-11-02 09:57:37
         compiled from "E:\server\inescms\fuel\app\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10630508d9c3cc97839-10892677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e07bc7e5eb133b0cedb042e21994eb86ab7dee3' => 
    array (
      0 => 'E:\\server\\inescms\\fuel\\app\\views\\default\\index.tpl',
      1 => 1351850255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10630508d9c3cc97839-10892677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_508d9c3cd4b583_29165585',
  'variables' => 
  array (
    'doctype' => 0,
    'title' => 0,
    'assets' => 0,
    'cssie' => 0,
    'logo' => 0,
    'social' => 0,
    'nav' => 0,
    'navigation' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508d9c3cd4b583_29165585')) {function content_508d9c3cd4b583_29165585($_smarty_tpl) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['doctype']->value)===null||$tmp==='' ? '<!DOCTYPE html>' : $tmp);?>

<html>
<head>
    <meta charset='utf-8'>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? 'Paweł Grzesiecki - webdesigner, webdeveloper' : $tmp);?>
 : Grzesiecki.com</title>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['assets']->value)===null||$tmp==='' ? '' : $tmp);?>
<!--[if IE]>
    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['cssie']->value)===null||$tmp==='' ? '' : $tmp);?>
<![endif]-->

</head>
<body>

<div class="container">

    <div id="header">

        <div class="row">
            <div class="onecol"></div>
            <div class="sevencol">
                <div id="logo">
                <?php echo $_smarty_tpl->tpl_vars['logo']->value;?>

                </div>
            </div>
            <div class="threecol">
                <div id="social">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['social']->value)===null||$tmp==='' ? '' : $tmp);?>

                </div>
            </div>
            <div class="onecol last"></div>
        </div>

        <div class="row">
            <div class="onecol"></div>
            <div class="tencol">
                <div id="slogan">
                    Jeżeli chcesz aby Twoje zlecenie zostało wykonane profesjonalnie oraz zgodnie z Twoimi
                    oczekiwaniami,
                    myślę ze nie musisz się już długo zastanawiać. Paweł Grzesiecki - Zapraszam do współpracy.
                </div>
            </div>
            <div class="onecol last"></div>
        </div>

    </div>

    <div id="content">
        <div class="row">
            <div class="onecol"></div>
            <div class="tencol">

            <?php if (isset($_smarty_tpl->tpl_vars['nav']->value)){?>
                <div class="nav">
                    <?php echo $_smarty_tpl->tpl_vars['navigation']->value;?>

                </div>
            <?php }?>

                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['body']->value)===null||$tmp==='' ? '' : $tmp);?>


            </div>
            <div class="onecol"></div>
        </div>
    </div>

    <div id="footer">
        <div class="row">
            <div class="onecol"></div>
            <div class="threecol"> 1 </div>
            <div class="threecol"> 2 </div>
            <div class="fourcol"> 3 </div>
            <div class="onecol last"></div>
        </div>
    </div>

</div>

</body>
</html><?php }} ?>