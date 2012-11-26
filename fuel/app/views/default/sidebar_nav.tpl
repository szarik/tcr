<div class="well sidebar-nav">
    <ul class="nav nav-list">
    	<li class="nav-header">Wybierz rodzaj wydarzenia</li>

        <li	{if !isset($event_categories) || !isset($smarty.get.kategoria) || $smarty.get.kategoria == 0}
                class="active"
            {/if}>
        
            <a href="?kategoria=0">Wszystko  ({$events_all})</a>
        
        </li>
    
	    {foreach from=$event_categories item=category}
	    	{if $category['how_many'] > 0}
		        <li	{if isset($smarty.get.kategoria) && $smarty.get.kategoria == $category['id']}
		                class="active" 
		            {/if}>
		            
		            <a style="display: inline" href="?kategoria={$category['id']}">{$category['name']}  ({$category['how_many']})</a>
		        </li>
	        {/if}
	    {/foreach}

        <li class="nav-header">Budżet</li>
        <li><a href="#">od 0 zł do 20 zł</a></li>
        <li><a href="#">do 40 zł</a></li>
        <li><a href="#">do 60 zł</a></li>
        <li><a href="#">do 80 zł</a></li>
        <li><a href="#">do 100 zł</a></li>
        <li><a href="#">szaleje do rana</a></li>
        
        <li class="nav-header">Kto idzie?</li>
        <li><a href="?preferencja=single">Sam</a></li>
        <li><a href="?preferencja=couple">Z dziewczyną/chłopakiem</a></li>
        <li><a href="?preferencja=group">Ze znajomymi</a></li>
    </ul>
</div>