{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- header.tpl start --> {/if}

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

<div id="popup-form" class="shadow">
	<b>UFO</b>
</div>
{$widok_cos|default:''}
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- header.tpl end --> {/if}