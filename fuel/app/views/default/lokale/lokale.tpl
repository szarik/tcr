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


<div class="row">
<div class="span8" style="padding-left:40px;">
<h3>{$place->name}</h3>
{if isset($place->address_street_name)}
<p>Adres: {$place->address_street_name}, {$place->address_city} </p>
{/if}
{if isset($place->phone)}
<p>Telefon: {$place->phone} </p>
{/if}
{if isset($place->website)}
<p>Strona www: <a href="{$place->website}" title="{$place->name}">{$place->website}</a> </p>
{/if}
{if isset($place->email)}
<p>Email: {$place->email} </p>
{/if}

{if isset($place->open_time)}
<p>Godziny otwarcia: {$place->open_time} </p>
{/if}
{if isset($place->wstep)}
<p>Wstęp: {$place->wstep} </p>
{/if}
{if isset($place->description)}
<p>Opis: {$place->description} </p>
{/if}
</div>
<div class="span4">
{if isset($place->photo)}
<div class="thumbnails">
<a href="#" class="thumbnail">
<img src="{$place->photo}" style="width:300px;">
</a>
</div>
{/if}
</div>



</div>
</div>
{/if}
{/foreach}

{$tooltip = 1}
{$ilosc_wyswietlonych_na_stronie = 6}
{$zmienna = -1}
{$licznik = 0}

{foreach from=$inne_wydarzenie item=event}
	    
           
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
{/foreach}
</div>
</div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl end --> {/if}