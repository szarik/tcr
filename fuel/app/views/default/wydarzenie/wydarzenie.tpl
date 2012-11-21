{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl start --> {/if}
<div class="container">
<div class="span8">
        {foreach from=$events item=event}
        	{if $id_wydarzenia == $event->id and $event->visible == 1}
            	{foreach from=$places item=place}
                	{if $event->place_id == $place->id}
  
            <ul class="breadcrumb">
                <li><a href="../../">Wydarzenia</a> <span class="divider">/</span></li>
                <li><a href="../../">{$place->name}</a> <span class="divider">/</span></li>
                <li class="active">{$event->name}</li>
            </ul>
            
            
            <h1>{$event->name}</h1>
            <div class="span4">
            	<img src="{$event->link_photo}" alt="" class="img-polaroid">
            </div>
            <div class="span6">
            	    <dl class="dl-horizontal">
                        <dt>Miejsce</dt>
                        
                        
                        <dd>{$event->place_id}</dd>
                        <dt>Lokalizacja</dt>
                        <dd>{$event->coordinates}</dd>
                        <dt>Rozpoczęcie</dt>
                        <dd>{$event->date_start}</dd>
                        <dt>Zakończenie</dt>
                        <dd>{$event->date_end}</dd>
                        <dt>Pobrano</dt>
                        <dd>{$event->link}</dd>
                        <dt>Preferencje</dt>
                        <dd>{$event->preferences}</dd>
                        <dt>Opis</dt>
                        <dd>{$event->description}</dd>
    				</dl>
            </div>
            {/if}
            {/foreach}
            {/if}
            
            {if $id_wydarzenia == $event->id and $event->visible != 1}
            
            	<h1>Podane wydarzenie zostało usunięte</h1>
            
            {/if}
            
        {/foreach}
        
</div>
    </div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl end --> {/if}