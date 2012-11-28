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

            
  
        
</div>
    </div>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl end --> {/if}