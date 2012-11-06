<?php /* Smarty version Smarty-3.1.11, created on 2012-11-02 09:22:32
         compiled from "E:\server\inescms\fuel\app\views\default\portfolio\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3211150925d30066b31-15264337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e26d682b49805e9085de30045177b33fad58ade2' => 
    array (
      0 => 'E:\\server\\inescms\\fuel\\app\\views\\default\\portfolio\\index.tpl',
      1 => 1351848150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3211150925d30066b31-15264337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50925d30113894_15114900',
  'variables' => 
  array (
    'portfolio' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50925d30113894_15114900')) {function content_50925d30113894_15114900($_smarty_tpl) {?><div class="portfolio_list">
    <?php  $_smarty_tpl->tpl_vars['img'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['img']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['portfolio']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['img']->key => $_smarty_tpl->tpl_vars['img']->value){
$_smarty_tpl->tpl_vars['img']->_loop = true;
?> <div class="portfolio_item"><?php echo $_smarty_tpl->tpl_vars['img']->value;?>
</div> <?php } ?>
    <div class="clear"></div>
</div>
<?php }} ?>