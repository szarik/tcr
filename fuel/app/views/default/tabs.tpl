<div class="tabbable" style="margin-bottom: 18px;">
    <ul class="nav nav-tabs" id="xmyTab">
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}class="active"{/if}>
            <a href="?strona=wydarzenia&kategoria={$smarty.get.kategoria|default:''}" data-toggle="tab">Wydarzenia</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}class="active"{/if}>
            <a href="?strona=lokalizator&kategoria={$smarty.get.kategoria|default:''}" data-toggle="tab">Lokalizator</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}class="active"{/if}>
            <a href="?strona=lokale&kategoria={$smarty.get.kategoria|default:''}"
               data-toggle="tab">Lokale</a>
        </li>
        <li
        {if isset($smarty.get.strona) && $smarty.get.strona == "dodaj_lokalizacje_lub_wydarzenie"}class="active"{/if}>
            <a href="?strona=dodaj_lokalizacje_lub_wydarzenie&kategoria={$smarty.get.kategoria|default:''}"
               data-toggle="tab">Dodaj Lokalizację lub wydarzenie</a>
        </li>
    </ul>
</div>