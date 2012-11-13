{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- tabs.tpl start --> {/if}
<div class="tabbable" style="margin-bottom: 18px;">
<ul class="nav nav-tabs" id="xmyTab">
    <li {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}class="active"{/if}>
        <a href="#tab1" data-toggle="tab">Wydarzenia</a>
    </li>
    <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}class="active"{/if}>
        <a href="#tab2" data-toggle="tab">Lokalizator</a>
    </li>
    <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}class="active"{/if}>
        <a href="#tab3" data-toggle="tab">Lokale</a>
    </li>
    <li
    {if isset($smarty.get.strona) && $smarty.get.strona == "dodaj_lokalizacje_lub_wydarzenie"}class="active"{/if}>
        <a href="#tab4" data-toggle="tab">Dodaj Lokalizację lub wydarzenie</a>
    </li>
</ul>

<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd; height:100%;">
<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}active{/if}" id="tab1">
    <p>


    <div class="row-fluid">
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="row-fluid">
        <ul class="thumbnails">
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
            <li class="span4">
                <div class="thumbnail">
                    <img src="http://placehold.it/300x200" alt="">

                    <div class="caption">
                        <h3>Wydarzenie</h3>

                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi
                            porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                        <p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn">Action</a></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>


    </p>
</div>


<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}active{/if}" id="tab2">

{if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}

    <script type="text/javascript">
        var mapa;    // obiekt globalny
        var dymek;    // okno z informacjami

            {foreach from=$places item=place}
            var geokoder{$place->id} = new google.maps.Geocoder();
            {/foreach}

        function mapaStart() {
            var wspolrzedne = new google.maps.LatLng(53.429805, 14.537883);
            var opcjeMapy = {
                zoom:15,
                center:wspolrzedne,
                mapTypeId:google.maps.MapTypeId.SATELLITE,
                disableDefaultUI:true
            };
            mapa = new google.maps.Map(document.getElementById("mapka"), opcjeMapy);
            dymek = new google.maps.InfoWindow();

            // ten marker będzie przesuwalny
            {foreach from=$places item=place name=place}
                {if $smarty.foreach.place.index < 11}
                        geokoder{$place->id}{literal}.geocode({address: "{/literal}{$place->miasto}, {$place->adres}{literal}"}, obslugaGeokodowania);{/literal}
                {/if}
            {/foreach}

        }

        function obslugaGeokodowania(wyniki, status) {
            var rozmiar = new google.maps.Size(32, 32);
            var rozmiar_cien = new google.maps.Size(59, 32);
            var punkt_startowy = new google.maps.Point(0, 0);
            var punkt_zaczepienia = new google.maps.Point(16, 16);

            var ikona = new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon52.png", rozmiar, punkt_startowy, punkt_zaczepienia);
            var cien = new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon52s.png", rozmiar_cien, punkt_startowy, punkt_zaczepienia);

            if (status == google.maps.GeocoderStatus.OK) {
                mapa.setCenter(wyniki[0].geometry.location);
                var marker = new google.maps.Marker(
                        {
                            map:mapa,
                            position:wyniki[0].geometry.location,
                            icon:ikona,
                            shadow:cien
                        }
                );
                dymek.open(mapa, marker);
                dymek.setContent('<strong>Poszukiwany adres</strong><br />Szczecin, Krzywoustego 23');
            }
            else {
                alert("Nie znalazłem podanego adresu!");
            }
        }

    </script>
    <div id="mapka" style="width: 600px; height: 500px; border: 1px solid black; background: gray;">
        <!-- tu będzie mapa -->
    </div>
    <p id="info">
        Na mapie zostanie wyświetlony marker, oznaczający lokację <strong>Szczecin, ul. Krzywoustego 23</strong>
    </p>
{/if}

</div>


<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}active{/if}" id="tab3">


{if isset($smarty.get.strona) && isset($selected_place)}



    <div class="thumbnail">
        <script type="text/javascript">
            var mapa;    // obiekt globalny
            var dymek;    // okno z informacjami
            var geokoder = new google.maps.Geocoder();

            function mapaStart() {
                var wspolrzedne = new google.maps.LatLng(53.429805, 14.537883);
                var opcjeMapy = {
                    zoom:15,
                    center:wspolrzedne,
                    mapTypeId:google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI:true,
                    navigationControl:true,
                    mapTypeControl:true,
                    scaleControl:true
                };
                mapa = new google.maps.Map(document.getElementById("mapka"), opcjeMapy);
                dymek = new google.maps.InfoWindow();

                {literal}geokoder.geocode({address:"{/literal}{$selected_place->miasto}, {$selected_place->adres}{literal}"}, obslugaGeokodowania);{/literal}
            }

            function obslugaGeokodowania(wyniki, status) {
                var rozmiar = new google.maps.Size(32, 32);
                var rozmiar_cien = new google.maps.Size(59, 32);
                var punkt_startowy = new google.maps.Point(0, 0);
                var punkt_zaczepienia = new google.maps.Point(16, 16);

                var ikona = new google.maps.MarkerImage("http://www.google.com/intl/en_ALL/mapfiles/marker.png", rozmiar, punkt_startowy, punkt_zaczepienia);
                var cien = new google.maps.MarkerImage("http://www.google.com/intl/en_ALL/mapfiles/shadow50.png", rozmiar_cien, punkt_startowy, punkt_zaczepienia);

                if (status == google.maps.GeocoderStatus.OK) {
                    mapa.setCenter(wyniki[0].geometry.location);
                    var marker = new google.maps.Marker(
                            {
                                map:mapa,
                                position:wyniki[0].geometry.location,
                                icon:ikona,
                                shadow:cien
                            }
                    );
                    dymek.open(mapa, marker);
                    dymek.setContent('<center><h3>{$selected_place->nazwa}</h3>{$selected_place->adres}, {$selected_place->miasto}<br />{$selected_place->telefon}</center>');
                }
                else {
                    alert("Nie znalazłem podanego adresu!");
                }
            }
        </script>


        <div class="row">
            <div class="span4" style="padding-left:40px;">
                <h3>{$selected_place->nazwa}</h3>

                <p>Adres: {$selected_place->adres}, {$selected_place->miasto} </p>

                <p>Telefon: {$selected_place->telefon} </p>

                <p>Strona www: {$selected_place->strona_www} </p>

                <p>Email: {$selected_place->email} </p>

                <p>Godziny otwarcia: {$selected_place->godziny_otwarcia} </p>

                <p>Wstęp: {$selected_place->wstep} </p>

                <p>Opis: {$selected_place->opis} </p>
            </div>
            <div class="span8">
                <div id="mapka" style="width: 570px; height: 500px; border: 1px solid black; background: gray;">
                    <!-- tu będzie mapa -->
                </div>
            </div>


        </div>
    </div>
    {else}

    <div class="row-fluid">
        <ul class="thumbnails">
            <li class="span5"></li>
            <li class="span5"></li>

            {foreach from=$places item=place}

                <li class="span5">
                    <h4>
                        <a href="?kategoria={$smarty.get.kategoria|default:''}&strona={$smarty.get.strona|default:''}&lokal={$place->id}">{$place->nazwa}</a>
                    </h4>
                </li>

            {/foreach}
        </ul>
    </div>
{/if}



</div>


<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "dodaj_lokalizacje_lub_wydarzenie"}active{/if}"
     id="tab4">
    tab4
</div>

</div>
</div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- tabs.tpl end --> {/if}