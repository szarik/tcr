<?php /* Smarty version Smarty-3.1.11, created on 2012-11-06 16:45:31
         compiled from "E:\server\tcr\git\fuel\app\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54450993eab25c3f3-78186287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87a2d58e37a72f4a3ed72f742156c1ce4797b15f' => 
    array (
      0 => 'E:\\server\\tcr\\git\\fuel\\app\\views\\default\\header.tpl',
      1 => 1352115981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54450993eab25c3f3-78186287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50993eab2a1e25_70208137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50993eab2a1e25_70208137')) {function content_50993eab2a1e25_70208137($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['config']->value['theme_show_comments'])&&$_smarty_tpl->tpl_vars['config']->value['theme_show_comments']==1){?> <!-- header.tpl start --> <?php }?>

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