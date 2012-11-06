<?php /* Smarty version Smarty-3.1.11, created on 2012-11-05 13:05:29
         compiled from "E:\server\tcr\dev\fuel\app\views\default\content_tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1065097b9996aa105-61034881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48a96b0874c2904ac32a41bbf04c387c35d68f9a' => 
    array (
      0 => 'E:\\server\\tcr\\dev\\fuel\\app\\views\\default\\content_tabs.tpl',
      1 => 1352120712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1065097b9996aa105-61034881',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5097b99979b7a3_50448318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5097b99979b7a3_50448318')) {function content_5097b99979b7a3_50448318($_smarty_tpl) {?><div class="tabbable" style="margin-bottom: 18px;">
    <ul class="nav nav-tabs" id="xmyTab">
        <li <?php if (isset($_GET['strona'])&&$_GET['strona']=="wydarzenia"){?>class="active"<?php }?>>
            <a href="?strona=wydarzenia&kategoria=<?php echo (($tmp = @$_GET['kategoria'])===null||$tmp==='' ? '' : $tmp);?>
" data-toggle="tab">Wydarzenia</a>
        </li>
        <li <?php if (isset($_GET['strona'])&&$_GET['strona']=="lokalizator"){?>class="active"<?php }?>>
            <a href="?strona=lokalizator&kategoria=<?php echo (($tmp = @$_GET['kategoria'])===null||$tmp==='' ? '' : $tmp);?>
" data-toggle="tab">Lokalizator</a>
        </li>
        <li <?php if (isset($_GET['strona'])&&$_GET['strona']=="lokale"){?>class="active"<?php }?>>
            <a href="?strona=lokale&kategoria=<?php echo (($tmp = @$_GET['kategoria'])===null||$tmp==='' ? '' : $tmp);?>
"
               data-toggle="tab">Lokale</a>
        </li>
        <li
        <?php if (isset($_GET['strona'])&&$_GET['strona']=="dodaj_lokalizacje_lub_wydarzenie"){?>class="active"<?php }?>>
            <a href="?strona=dodaj_lokalizacje_lub_wydarzenie&kategoria=<?php echo (($tmp = @$_GET['kategoria'])===null||$tmp==='' ? '' : $tmp);?>
"
               data-toggle="tab">Dodaj Lokalizację lub wydarzenie</a>
        </li>
    </ul>
</div><?php }} ?>