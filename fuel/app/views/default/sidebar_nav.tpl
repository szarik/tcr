<!--<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list "> -->
<div class="well sidebar-nav">
    <ul class="nav nav-list bs-docs-sidenav"> 
    	<li class="nav-header">Wybierz rodzaj wydarzenia</li>

        <li	{if !isset($smarty.get.kategoria)}
                class="active"
            {/if}>
        
            <a href="javascript:ustawFiltr('kategoria', null)">Wszystko  ({$events_all})</a>
        </li>
    
	    {foreach from=$event_categories item=category}
	    	{if $category['how_many'] > 0}
		        <li	{if isset($smarty.get.kategoria) && $category['selected'] == 'true'}
		                class="active" 
		            {/if}>
		            
		            <a href="javascript:ustawFiltr('kategoria', '{$category['name']}')">{$category['name']}  ({$category['how_many']})</a>
		        </li>
	        {/if}
	    {/foreach}
		<li  class="nav-header">Data</li>
        	{foreach from=$dates item=date}
	        <li {if $date['selected'] == 'true'}
	                class="active" 
	            {/if}><a href="javascript:ustawFiltr('data', '{if isset($date['get_param'])}{$date['get_param']}{else}{$date['name']}{/if}')">{$date['name']}</a></li>
        	{/foreach}
        </li>
        <li class="nav-header">Budżet</li>
        {foreach from=$prices item=price}
        <li {if isset($smarty.get.cena) && $price['selected'] == 'true'}
                class="active" 
            {/if}><a href="javascript:ustawFiltr('cena', '{if isset($price['get_param'])}{$price['get_param']}{else}{$price['name']}{/if}')">{$price['name']}</a></li>
        {/foreach}
        <li {if !isset($smarty.get.cena)}
                class="active" 
            {/if}><a href="javascript:ustawFiltr('cena', null)">Szaleję do rana</a></li>
        
        <li class="nav-header">Kto idzie?</li>
        {foreach from=$preferences item=preference}
	        <li {if isset($smarty.get.preferencja) && $preference['selected'] == 'true'}
	                class="active" 
	            {/if}><a href="javascript:ustawFiltr('preferencja', '{$preference['name']}')">{$preference['name']}</a></li>
        {/foreach}
    </ul>
</div>