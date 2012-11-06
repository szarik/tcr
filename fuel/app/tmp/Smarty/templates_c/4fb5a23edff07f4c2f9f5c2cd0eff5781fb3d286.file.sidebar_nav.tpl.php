<?php /* Smarty version Smarty-3.1.11, created on 2012-11-05 12:55:40
         compiled from "E:\server\tcr\dev\fuel\app\views\default\sidebar_nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114065097b74c907ad2-14940074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fb5a23edff07f4c2f9f5c2cd0eff5781fb3d286' => 
    array (
      0 => 'E:\\server\\tcr\\dev\\fuel\\app\\views\\default\\sidebar_nav.tpl',
      1 => 1352120129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114065097b74c907ad2-14940074',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'event_categories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5097b74c9f9c50_43945861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5097b74c9f9c50_43945861')) {function content_5097b74c9f9c50_43945861($_smarty_tpl) {?><div class="well sidebar-nav">
    <ul class="nav nav-list">
        <li class="nav-header">Wybierz rodzaj wydarzenia</li>

        <li
        <?php if (!isset($_smarty_tpl->tpl_vars['event_categories']->value)||!isset($_GET['kategoria'])||$_GET['kategoria']==0){?>class="active"<?php }?>>
            <a href="?kategoria=0&strona=<?php if (isset($_GET['strona'])){?><?php echo $_GET['strona'];?>
<?php }?>">Wszystko</a>
        </li>
    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['event_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
        <li <?php if (isset($_GET['kategoria'])&&$_GET['kategoria']==$_smarty_tpl->tpl_vars['category']->value->id){?>
                class="active" <?php }?>>
            <a href="?kategoria=<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
&strona=<?php if (isset($_GET['strona'])){?><?php echo $_GET['strona'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['category']->value->nazwa;?>
</a>
        </li>
    <?php } ?>


        <li class="nav-header">Budżet</li>
        <li><a href="#">od 0 zł do 20 zł</a></li>
        <li><a href="#">do 40 zł</a></li>
        <li><a href="#">do 60 zł</a></li>
        <li><a href="#">do 80 zł</a></li>
        <li><a href="#">do 100 zł</a></li>
        <li><a href="#">szaleje do rana</a></li>
        <li class="nav-header">Kto idzie?</li>
        <li><a href="#">Sam</a></li>
        <li><a href="#">Z dziewczyną/chłopakiem</a></li>
        <li><a href="#">Ze znajomymi</a></li>
    </ul>
</div><?php }} ?>