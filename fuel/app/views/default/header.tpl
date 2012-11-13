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
                    <li class="active"><a href="#">Strona główna</a></li>
                    <li>
                        {$header_search.open}
                            {$header_search.field}
                            {$header_search.submit}
                        {$header_search.close}
                    </li>
                    <li><a href="#about">Jak to działa?</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

{include file="$theme/events_places_popup.tpl"}

{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- header.tpl end --> {/if}