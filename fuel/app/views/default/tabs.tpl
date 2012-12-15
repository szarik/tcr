{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- tabs.tpl start --> {/if}
<div class="tabbable" style="margin-bottom: 18px;">
    <ul class="nav nav-tabs" id="xmyTab">
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}class="active"{/if}
            {if empty($smarty.get.strona)}class="active"{/if}>
            <a href="#tab1" data-toggle="tab">Wydarzenia</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}class="active"{/if}>
            <a href="#tab4" data-toggle="tab">Wydarzenia Lista</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}class="active"{/if}>
            <a href="#tab2" data-toggle="tab">Lokalizator miejsc</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator_wydarzen"}class="active"{/if}>
            <a href="#tab5" data-toggle="tab">Lokalizator wydarzeń</a>
        </li>
        <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}class="active"{/if}>
            <a href="#tab3" data-toggle="tab">Lokale</a>
        </li>

    </ul>

    <div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd; height:100%;">
    {include file="default/tabs/wydarzenia.tpl"}
    {include file="default/tabs/lokale_lista.tpl"}
    {include file="default/tabs/lokalizator_miejsca.tpl"}
    {include file="default/tabs/lokalizator_wydarzen.tpl"}
    {include file="default/tabs/lokale.tpl"}
    </div>
</div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- tabs.tpl end --> {/if}