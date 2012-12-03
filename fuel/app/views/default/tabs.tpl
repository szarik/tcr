                                                                     
                                                                     
                                                                     
                                             
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
        <a href="#tab2" data-toggle="tab">Lokalizator</a>
    </li>
    <li {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}class="active"{/if}>
        <a href="#tab3" data-toggle="tab">Lokale</a>
    </li>

</ul>

<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd; height:100%;">
<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}active{/if} 
                     {if !isset($smarty.get.strona)}active{/if}" id="tab1">
    <p>


		{$ilosc_wyswietlonych_na_stronie = 6}
        {$zmienna = -1} 
        {$licznik = 0}
        {$wydarzenia_dla_strony = $ilosc_wyswietlonych_na_stronie*($nr_strony-1)}
        
        {foreach from=$events item=event}
        	{$licznik = $licznik + 1}
            
            {if $licznik > $wydarzenia_dla_strony}
                {if $licznik <= $ilosc_wyswietlonych_na_stronie+$wydarzenia_dla_strony}
                    {if $event->visible == 1}
                        {$zmienna = $zmienna + 1}
                        
                        {if $zmienna%3 == 0}
                        <div class="row-fluid">
                        <ul class="thumbnails">
                        {/if}
                        
                            <li class="span4">
                                <div class="thumbnail">
                                    {if empty($event->link_photo) or $event->link_photo == "http://pik.wroclaw.pl/"}
                                    <img src="http://www.dev.tocorobimy.pl/public/assets/img/brak-foty.png" alt="" class="event-image" />
                                    {else}
                                    <img src="{$event->link_photo}" alt="" class="event-image" />
               						{/if}
                                    <div class="caption" style="margin-top:180px;">
                                   
                                        <h4>{$event->name|strip_tags|substr:0:70}{if $event->name|strlen >= 70}...{/if}</h4>
                    <span class="label label-important">
                    {foreach from=$places item=place}
                		{if $place->id == $event->place_id}
                    		{$place->name|strip_tags|substr:0:38}{if $place->name|strlen >= 38}...{/if}
                    	{/if}
                    {/foreach}
                    </span>
                   <!-- |replace:'Tuesday':'Wtorek'|
                    replace:'Wednesday:'Środa'|
                    replace:'Thursday':'Czwartek'|
                    replace:'Friday':'Piątek'|
                    replace:'Saturday':'Sobota'
                    |replace:'Sunday':'Niedziela' -->
                    <br />
                    <span class="label">{$event->date_start|date_format:"%A, %H:%M %e-%m-%Y"|replace:'Monday':'Poniedziałek'|replace:'Tuesday':'Wtorek'|replace:'Wednesday':'Środa'|replace:'Thursday':'Czwartek'|replace:'Friday':'Piątek'|replace:'Saturday':'Sobota'|replace:'Sunday':'Niedziela'}</span> <br />
                    
                    <span class="label label-success">
                    {foreach from=$event_categories item=category}
						{if $event->category_id == $category['id']}
                        {$category['name']} 
						{/if} 
	    			{/foreach}
                    </span><br />
                    <span class="label label-info">
                    {$event->preferences|replace:'sam':'single'|replace:'para':'pary'|replace:'grupa':'grupy'}</span><br />
                    
                    
                                        <p>{$event->description|strip_tags|substr:0:150} </p>
                
                                        <p><a href="/public/wydarzenia/wydarzenie/{$event->id}" class="btn btn-primary">Zobacz</a> <a href="#" class="btn">JakDojade</a></p>
                                    </div>
                                </div>
                            </li>
                        
                        {if $zmienna%3 == 2} 
                        </ul>
                        </div>
                        {/if}
                    {/if}
        	
{/if}{/if}

        {/foreach}
        
		{if $zmienna%3 == 1} 
            </ul>
    		</div>
            {/if}
            
            {if $zmienna%3 == 0} 
            </ul>
    		</div>
            {/if}
        <div align="center" class="pagination">
    <ul>
    {$next = $nr_strony +1}
    {$prev = $nr_strony }
    
   
    {$strona = $licznik / $ilosc_wyswietlonych_na_stronie}
{$strona = $strona +1}
    {$zmienna_pomocnicza = $nr_strony}
    {$zmienna_w_petli = 0}
    {$ograniczenie_gorne= 5}
     {if $strona < 10}
            {$ogranicznie_dolne = $nr_strony}
     		{$ograniczenie_gorne = $nr_strony+5}
        {else}
            {$ogranicznie_dolne = $nr_strony-4}
        	{$ograniczenie_gorne = $nr_strony+4}
      {/if}
      
    {if $prev <= 0}
    	{$prev = 1}
    {/if}
    
    {if $next > $strona}
   	 {$next = $strona}
    {/if}
   
   
   
   {if empty($kategoriaa)}
            {if $prev != 1}
        <li><a href="/public/wydarzenia/strona/{$prev-1}">Poprzednia</a></li>
       {/if}
	{else}  
         {if $prev != 1}
        <li><a href="/public/wydarzenia/strona/{$prev-1}?kategoria={$kategoriaa}">Poprzednia</a></li>
       {/if} 
    {/if}

   {$ogranicznie_dolne = $ogranicznie_dolne -4}
   

    {for $zmienna_pomocnicza=$ogranicznie_dolne to $ograniczenie_gorne}  
    		 {if $zmienna_pomocnicza <= $strona}
             {if $zmienna_pomocnicza > 0}
             
             	{if empty($kategoriaa)}
             
             		 <li><a href="/public/wydarzenia/strona/{$zmienna_pomocnicza}">
                     	{if $zmienna_pomocnicza == $nr_strony} <b>{$zmienna_pomocnicza}</b>{else} {$zmienna_pomocnicza}{/if}</a></li>
				{else}
                	<li><a href="/public/wydarzenia/strona/{$zmienna_pomocnicza}?kategoria={$kategoriaa}">
                     	{if $zmienna_pomocnicza == $nr_strony} <b>{$zmienna_pomocnicza}</b>{else} {$zmienna_pomocnicza}{/if}</a></li>
                {/if}
			{/if}
            {/if}
    {/for}
    

	{if empty($kategoriaa)}
        {if $next != $strona}
        <a href="/public/wydarzenia/strona/{$next}">Następna</a></li>
        {/if}
	{else}  
     {if $next != $strona}
        <a href="{$next}?kategoria={$kategoriaa}">Następna</a></li>
        {/if}  
    {/if}
    <!-- {while $zmienna_pomocnicza < 10+$nr_strony}
    
       {$zmienna_w_petli = $zmienna_w_petli + 1}
       {$zmienna_pomocnicza = $zmienna_pomocnicza + 1}
    		  <li><a href="{$zmienna_pomocnicza}">{$zmienna_pomocnicza}</a></li>

    {/while} -->
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



  
        </script>


        <div class="row">
            <div class="span4" style="padding-left:40px;">
                <h3>{$selected_place->name}</h3>

                <p>Adress: {$selected_place->address_street_name}, {$selected_place->address_city} </p>

                <p>Telefon: {$selected_place->phone} </p>

                <p>Strona www: {$selected_place->website} </p>

                <p>Email: {$selected_place->email} </p>

                <p>Godziny otwarcia: {$selected_place->open_time} </p>

                <p>Wstęp: {$selected_place->wstep} </p>

                <p>Opis: {$selected_place->description} </p>
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
                        <a href="miejsca/miejsce/{$place->id}">{$place->name}</a>
                    </h4>
                </li>

            {/foreach}
        </ul>
    </div>
{/if}



</div>
 

<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "dodaj_lokalizacje_lub_wydarzenie"}active{/if}"
     id="tab4">
   	<table class="table table-hover">
     <thead>
		<tr>
    	<th style="width:300px;">Zdjęcie</th>
        <th>Nazwa</th>
        <th>Lokalizacja</th>
        <th>Data</th>
        <!--<th>Preferencje>-->
        <th>Kategoria</th>
       <!-- <th>Budżet</th>-->
        <th>Przejdź</th>
    </tr> 
    </thead>
     <tbody>
     <style>
	 .event-image2 {
    margin-top: -20px;
    position: absolute;
    clip: rect(20px, 260px, 90px, 0px);
    width: 300px;
}

	 </style>
     	{$ilosc_wyswietlonych_na_stronie = 600}
        {$zmienna = -1} 
        {$licznik = 0}
        {$wydarzenia_dla_strony = $ilosc_wyswietlonych_na_stronie*($nr_strony-1)}
        
      {foreach from=$events item=event}
        	{$licznik = $licznik + 1}
            
            {if $licznik > $wydarzenia_dla_strony}
                {if $licznik <= $ilosc_wyswietlonych_na_stronie+$wydarzenia_dla_strony}
                    {if $event->visible == 1}
                        {$zmienna = $zmienna + 1}
						<tr>
                           <td>
                                    {if empty($event->link_photo) or $event->link_photo == "http://pik.wroclaw.pl/"}
                                    <img src="http://www.dev.tocorobimy.pl/public/assets/img/brak-foty.png" alt="" class="event-image" />
                                    {else}
                                    <img src="{$event->link_photo}" alt="" class="event-image2"  style=""/>
               						{/if}
                                    </td>
                                    <td>{$event->name|strip_tags|substr:0:70}{if $event->name|strlen >= 70}...{/if}</td>
                    <td>
                    {foreach from=$places item=place}
                		{if $place->id == $event->place_id}
                    		{$place->name|strip_tags|substr:0:38}{if $place->name|strlen >= 38}...{/if}
                    	{/if}
                    {/foreach}
                    </td>
                  <td>{$event->date_start|date_format:"%A, %H:%M %e-%m-%Y"|replace:'Monday':'Poniedziałek'|replace:'Tuesday':'Wtorek'|replace:'Wednesday':'Środa'|replace:'Thursday':'Czwartek'|replace:'Friday':'Piątek'|replace:'Saturday':'Sobota'|replace:'Sunday':'Niedziela'}</td>
                    
                    <td>
                    {foreach from=$event_categories item=category}
						{if $event->category_id == $category['id']}
                        {$category['name']} 
						{/if} 
	    			{/foreach}
                    </td>
                    <!--<td>{$event->preferences|replace:'sam':'single'|replace:'para':'pary'|replace:'grupa':'grupy'}</td>
                    <td></td>-->
                    <td> <p><a href="/public/wydarzenia/wydarzenie/{$event->id}" class="btn btn-primary">Zobacz</a> <a href="#" class="btn">JakDojade</a></p></td>
                    
                    
                                       <!-- <p>{$event->description|strip_tags|substr:0:150} </p>-->
                
                           </tr>            
                        
                       
                    {/if}
        	
{/if}{/if}

        {/foreach}
        
          
      
     </tbody>
    </table>
</div>

</div> 
</div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- tabs.tpl end --> {/if}