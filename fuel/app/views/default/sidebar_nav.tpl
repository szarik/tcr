<div class="well sidebar-nav">
    <ul class="nav nav-list">
        	<li class="nav-header">Wybierz rodzaj wydarzenia</li>

            <li	{if !isset($event_categories) || !isset($smarty.get.kategoria) || $smarty.get.kategoria == 0}
                    class="active"
                {/if}>
            
                <a href="?kategoria=0&strona={if isset($smarty.get.strona)}{$smarty.get.strona}{/if}">Wszystko</a>
            
            </li>
        
        {foreach from=$event_categories item=category}
            <li	{if isset($smarty.get.kategoria) && $smarty.get.kategoria == $category->id}
                    class="active" 
                {/if}>
                
                <a href="?kategoria={$category->id}&strona={if isset($smarty.get.strona)}{$smarty.get.strona}{/if}">{$category->name}</a>
                
            </li>
        {/foreach}


            <li class="nav-header">Budżet</li>
            <li><a href="#">od 0 zł do 20 zł</a></li>
            <li><a href="#">do 40 zł</a></li>
            <li><a href="#">do 60 zł</a></li>
            <li><a href="#">do 80 zł</a></li>
            <li><a href="#">do 100 zł</a></li>
            <li><a href="#">szaleje do rana</a></li>
            <li class="nav-header">Kto idzie?</li>
            <li><a href="#">Sam</a></li>
            <li><a href="#">Z dziewczyną/chłopakiem</a></li>
            <li><a href="#">Ze znajomymi</a></li>
    </ul>
</div>