<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "lokale"}active{/if}" id="tab3">


{if isset($smarty.get.strona) && isset($selected_place)}

	<div class="row">
		<div class="span4" style="padding-left:40px;">
			<h3>{$selected_place->name}</h3>

			<p>Adres: {$selected_place->address_street_name}, {$selected_place->address_city} </p>

			<p>Telefon: {$selected_place->phone} </p>

			<p>Strona www: {$selected_place->website} </p>

			<p>Email: {$selected_place->email} </p>

			<p>Godziny otwarcia: {$selected_place->open_time} </p>

			<p>Wstęp: {$selected_place->wstep} </p>

			<p>Opis: {$selected_place->description} </p>
            
            
            
            <!--{foreach from=$inne_wydarzenia item=inne_wydarzenie}
            <p>Inne {$inne_wydarzenie->name}</p>
            {/foreach}-->
		</div>
		<div class="span8">
			<div id="mapka" style="width: 570px; height: 500px; border: 1px solid black; background: gray;">
				<!-- tu będzie mapa -->
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
						<a href="/miejsca/miejsce/{$place->id}">{$place->name}</a>
					</h4>
				</li>

            {/foreach}
		</ul>
	</div>
{/if}

</div>