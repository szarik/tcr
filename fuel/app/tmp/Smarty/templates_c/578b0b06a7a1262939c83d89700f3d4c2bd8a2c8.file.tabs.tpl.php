<?php /* Smarty version Smarty-3.1.11, created on 2012-11-06 16:45:31
         compiled from "E:\server\tcr\git\fuel\app\views\default\tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1372650993eab3b84b9-28774234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '578b0b06a7a1262939c83d89700f3d4c2bd8a2c8' => 
    array (
      0 => 'E:\\server\\tcr\\git\\fuel\\app\\views\\default\\tabs.tpl',
      1 => 1352120712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1372650993eab3b84b9-28774234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50993eab4bd7c3_04676666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50993eab4bd7c3_04676666')) {function content_50993eab4bd7c3_04676666($_smarty_tpl) {?><div class="tabbable" style="margin-bottom: 18px;">
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