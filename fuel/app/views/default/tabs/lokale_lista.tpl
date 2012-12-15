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
								<img src="http://www.dev.tocorobimy.pl/public/assets/img/brak-foty.png" alt="" class="event-image"/>
                                {else}
								<img src="{$event->link_photo}" alt="" class="event-image2" style=""/>
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
						<td>
							<p>
								<a href="/public/wydarzenia/wydarzenie/{$event->id}" class="btn btn-primary">Zobacz</a>
                                {if isset($event->map_lat) && isset($event->map_lon)}
									<a href="http://jakdojade.pl/?tc={$event->map_lat}:{$event->map_lon}&cid=2000" target="_blank" class="btn">JakDojade</a>
                                    {elseif isset($event->address_street_name)}
									<a href="http://jakdojade.pl/?tn={$event->address_street_name}&cid=2000" target="_blank" class="btn">JakDojade</a>
                                {/if}
							</p>
						</td>


						<!-- <p>{$event->description|strip_tags|substr:0:150} </p>-->

					</tr>


                    {/if}

                {/if}{/if}

        {/foreach}


		</tbody>
	</table>
</div>