{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl start --> {/if}
<div class="container">
<div class="span8">

            	{foreach from=$places item=place}
                	{if $place->id == $id_miejsce}
  
            <ul class="breadcrumb">
                <li><a href="../../">Lokale</a> <span class="divider">/</span></li>
                <li>{$place->name}</li>
            </ul>

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

                {literal}geokoder.geocode({address:"{/literal}{$place->address_city}, {$place->address_street_name}{literal}"}, obslugaGeokodowania);{/literal}
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
                    dymek.setContent('<center><h3>{$place->name}</h3>{$place->address_street_name}, {$place->address_city}<br />{$place->phone}</center>');
                }
                else {
                    alert("Nie znalazłem podanego adresu!");
                }
            }
        </script>


        <div class="row">
            <div class="span4" style="padding-left:40px;">
                <h3>{$place->name}</h3>

                <p>Adres: {$place->address_street_name}, {$place->address_city} </p>

                <p>Telefon: {$place->phone} </p>

                <p>Strona www: {$place->website} </p>

                <p>Email: {$place->email} </p>

                <p>Godziny otwarcia: {$place->open_time} </p>

                <p>Wstęp: {$place->wstep} </p>

                <p>Opis: {$place->description} </p>
            </div>
            <div class="span8">
                <div id="mapka" style="width: 570px; height: 500px; border: 1px solid black; background: gray;">
                    <!-- tu będzie mapa -->
                </div>
            </div>


        </div>
    </div>
            {/if}
            {/foreach}

            
  
        
</div>
    </div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl end --> {/if}