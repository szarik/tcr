<?php /* Smarty version Smarty-3.1.11, created on 2012-11-05 11:46:23
         compiled from "E:\server\tcr\dev\fuel\app\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197885097a4d8891231-01431593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a9fbe67b1ee1a25e42437ebf3727d7551054bd3' => 
    array (
      0 => 'E:\\server\\tcr\\dev\\fuel\\app\\views\\default\\header.tpl',
      1 => 1352115981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197885097a4d8891231-01431593',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5097a4d8895498_95473952',
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5097a4d8895498_95473952')) {function content_5097a4d8895498_95473952($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['config']->value['theme_show_comments'])&&$_smarty_tpl->tpl_vars['config']->value['theme_show_comments']==1){?> <!-- header.tpl start --> <?php }?>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"></a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="#" class="btn btn-info dropdown-toggle">+ Dodaj miejsce</a> &nbsp;&nbsp;
                    <a href="#" class="btn btn-info dropdown-toggle">+ Dodaj wydarzenie</a>
                </p>
                <ul class="nav">
                    <li class="active"><a href="#">Strona główna</a></li>
                    <li>
                        <form class="navbar-search pull-left">
                            <input type="text" class="search-query" placeholder="Podaj adres">
                            <button type="submit" class="btn btn-inverse">Szukaj</button>
                        </form>
                    </li>
                    <li><a href="#about">Jak to działa?</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['config']->value['theme_show_comments'])&&$_smarty_tpl->tpl_vars['config']->value['theme_show_comments']==1){?> <!-- header.tpl end --> <?php }?><?php }} ?>