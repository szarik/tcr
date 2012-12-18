<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "wydarzenia"}active{/if}
                     {if !isset($smarty.get.strona)}active{/if}" id="tab1">
<p>
{$tooltip = 1}
{$ilosc_wyswietlonych_na_stronie = 6}
{$zmienna = -1}
{$licznik = 0}
{$wydarzenia_dla_strony = $ilosc_wyswietlonych_na_stronie*($nr_strony-1)}


{$tablica_wydarzen = array()}

{foreach from=$events item=event}
    {if in_array($event->name, $tablica_wydarzen)}
    
				
                
        {else}
        {$tablica_wydarzen[] = $event->name}

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
								<img src="http://www.dev.tocorobimy.pl/public/assets/img/brak-foty.png" alt="" class="event-image"/>
                                {else}
								<img src="{$event->link_photo}" alt="" class="event-image"/>
                            {/if}
							<div class="caption" style="margin-top:180px;">

								<h4>{$event->name|strip_tags|substr:0:70}{if $event->name|strlen >= 70}...{/if}</h4>
                            <span class="label label-important">
                            {$tooltip = $tooltip + 1}
                                <!-- <a href="#" rel="tooltip{$tooltip}" data-original-title="Inne Kina"  data-placement="bottom" data-content="
                              {$tablica_miejsc[$event->name]}
                               		
                              
                                
                                ">-->{foreach from=$places item=place}
                                    {if $place->id == $event->place_id}
                                        
                               {$place->name|strip_tags|substr:0:38}{if $place->name|strlen >= 38}...{/if}
                                    {/if}
                                {/foreach}<!--</a>  -->
								<script type="text/javascript">
									$("[rel=tooltip{$tooltip}]").popover()
								</script>
							</span>
								<br/>
								<span class="label">
                                
                               
                               
                                {$event->date_start|date_format:"%A, %H:%M %e-%m-%Y"|replace:'Monday':'Poniedziałek'|replace:'Tuesday':'Wtorek'|replace:'Wednesday':'Środa'|replace:'Thursday':'Czwartek'|replace:'Friday':'Piątek'|replace:'Saturday':'Sobota'|replace:'Sunday':'Niedziela'}
                               
                                </span>
								<br/>

                            <span class="label label-success">
                                {foreach from=$event_categories item=category}
                                {if $event->category_id == $category['id']}
                                    {$category['name']}
                                {/if}
                            {/foreach}
							</span><br/>
                            <!-- <span class="label label-info">
                               {$event->preferences|replace:'sam':'single'|replace:'para':'pary'|replace:'grupa':'grupy'}</span><br/>-->


								<p>{$event->description|strip_tags|substr:0:150} </p>

								<p>
									<a href="/wydarzenia/wydarzenie/{$event->id}{if isset($smarty.get)}/?{/if}{if isset($smarty.get.kategoria)}kategoria={$smarty.get.kategoria}{/if}{if isset($smarty.get.kategoria) && isset($smarty.get.data)}&{/if}{if isset($smarty.get.data)}data={$smarty.get.data}{/if}" class="btn btn-primary">Zobacz</a>
                                    {if isset($event->map_lat) && isset($event->map_lon)}
										<a href="http://jakdojade.pl/?tc={$event->map_lat}:{$event->map_lon}&cid=2000" target="_blank" class="btn">JakDojade</a>
                                        {elseif isset($event->address_street_name)}
										<a href="http://jakdojade.pl/?tn={$event->address_street_name}&cid=2000" target="_blank" class="btn">JakDojade</a>
                                    {/if}
								</p>
							</div>
						</div>
					</li>

                    {if $zmienna%3 == 2}
					</ul>
					</div>
                    {/if}
                {/if}

            {/if}{/if}{/if}

{/foreach}

{if $zmienna%3 == 1}
	</ul>
</div>
{/if}

{if $zmienna%3 == 0}
	</ul>
</div>
{/if}

{$znak_zapytania = ""}
{if (isset($smarty.get.kategoria) or isset($smarty.get.preferencja) or isset($smarty.get.cena) or isset($smarty.get.data))}
    {$znak_zapytania = "?"}
{/if}

{$kategoria = ""}
{$var_kategoria = ""}

{if isset($smarty.get.kategoria)}
    {$kategoria = "kategoria="}
    {$var_kategoria = $smarty.get.kategoria}
{/if}

{$preferencja = ""}
{$var_preferencja = ""}

{if isset($smarty.get.preferencja)}
    {$preferencja = "&preferencja="}
    {$var_preferencja = $smarty.get.preferencja}
{/if}

{$cena = ""}
{$var_cena = ""}

{if isset($smarty.get.cena)}
    {$cena  = "&cena="}
    {$var_cena = $smarty.get.cena}
{/if}

{$data = ""}
{$var_data = ""}
{if isset($smarty.get.data)}
    {$data  = "&data="}
    {$var_data = $smarty.get.data}
{/if}

{assign var="ogon" value="`$znak_zapytania``$kategoria``$var_kategoria``$preferencja``$var_preferencja``$cena``$var_cena``$data``$var_data`"}

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




    {if $prev != 1}
		<li><a href="/wydarzenia/strona/{$prev-1}{$ogon}">Poprzednia</a></li>
    {/if}


    {$ogranicznie_dolne = $ogranicznie_dolne -4}


    {for $zmienna_pomocnicza=$ogranicznie_dolne to $ograniczenie_gorne}
        {if $zmienna_pomocnicza <= $strona}
            {if $zmienna_pomocnicza > 0}


				<li><a href="/wydarzenia/strona/{$zmienna_pomocnicza}{$ogon}">
                    {if $zmienna_pomocnicza == $nr_strony} <b>{$zmienna_pomocnicza}</b>{else} {$zmienna_pomocnicza}{/if}
				</a></li>

            {/if}
        {/if}
    {/for}


		<!-- {$znak_zapytania}{$kategoria}{$var_kategoria}{$preferencja}{$var_preferencja}{$cena}{$var_cena}{$data}{$var_data}
       		 `$znak_zapytania``$kategoria``$var_kategoria``$preferencja``$var_preferencja``$cena``$var_cena``$data``$var_data` -->


    {if $next != $strona}
		<a href="/wydarzenia/strona/{$next}{$ogon}">Następna</a></li>
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