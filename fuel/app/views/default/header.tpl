{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- header.tpl start --> {/if}

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{$config.path}"></a>

            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <a href="#form-place" class="btn btn-info colorbox">+ Dodaj miejsce</a> &nbsp;&nbsp;
                    <a href="#form-event" class="btn btn-info colorbox">+ Dodaj wydarzenie</a>
                </p>
                <ul class="nav">
                    <li {if isset($highlight_strona_glowna)}
                    	class="active"
                    	{/if}>{$strona_glowna_header|default:""}</li>
                    <li>
                        {$header_search.open}
                            {$header_search.field}
                            {$header_search.submit}
                        {$header_search.close}
                    </li>
                    <li {if isset($current_site) && $current_site === "strona/jak_to_dziala"}
                    	class="active"
                    	{/if}>{$jak_to_dziala_header|default:""}</li>
                    <li {if isset($current_site) && $current_site === "strona/kontakt"}
                    	class="active"
                    	{/if}>{$kontakt_header|default:""}</li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

{include file="$theme/events_places_popup.tpl"}

{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- header.tpl end --> {/if}