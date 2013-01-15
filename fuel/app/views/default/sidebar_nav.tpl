<!--<div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list "> -->
<div class="well sidebar-nav">
    <ul class="nav nav-list bs-docs-sidenav"> 
    	<li class="nav-header">Kategorie wydarzeń</li>

        <li	{if !isset($smarty.get.kategoria)}
                class="active"
            {/if}>
        
            <a href="javascript:ustawFiltr('kategoria', null, false)">
            {if !isset($smarty.get.kategoria)}
               <i class="icon-ok"></i>
            {/if}
            
            {if isset($smarty.get.kategoria)}Usuń filtr{else}Dowolna{/if}  ({$events_all})
            {if !isset($smarty.get.kategoria)}
                <i style="margin-top:2px;" class="icon-chevron-right icon-white pull-right"></i>
            {/if}
            </a>
        </li>
    
	    {foreach from=$event_categories item=category}
	    	{if $category['how_many'] > 0}
		        <li	{if isset($smarty.get.kategoria) && $category['selected'] == 'true'}
		                class="active"
		            {/if}>
		            <a href="javascript:ustawFiltr('kategoria', '{$category['name']}', false)">
                     {if isset($smarty.get.kategoria) && $category['selected'] == 'true'}
                     <i class="icon-ok">
                     {/if}
                     </i>
                    {$category['name']}  ({$category['how_many']}) 
                     {if isset($smarty.get.kategoria) && $category['selected'] == 'true'}
                     <i style="margin-top:2px;" class="icon-chevron-right icon-white pull-right"></i>
                      {/if}
                    </a>
		        </li>
	        {/if}
	    {/foreach}
	    
		<li class="nav-header">Data</li>
        
        
        <li {if !isset($smarty.get.data)}
        		class="active"
        	{/if}>
           
        	<a href="javascript:ustawFiltr('data', null, false)">Dowolna  {if !isset($smarty.get.data)}
             <i style="margin-top:2px;" class="icon-chevron-right icon-white pull-right"></i>
            {/if}</a>
            
        </li>
        <li {if isset($smarty.get.data)}
        		class="active"
        	{/if}>        	<a href="#" class="datepicker" data-date-format="yyyyyy-mm-dd" data-date="javascript:date()">{if !isset($smarty.get.data)}<i style="padding-left:-500px;" class="icon-chevron-down"></i> Zmień datę{else}<i style="padding-left:-500px;" class="icon-chevron-down"></i>{$smarty.get.data|replace:'_':' '} <i class="icon-calendar"></i>  
            
            {/if}   <i style="margin-top:2px;" class="icon-chevron-right icon-white pull-right"></i></a>
        </li>
        <li>
        <!-- 
        <li class="nav-header">Budżet</li>
        <li {if !isset($smarty.get.cena)}
                class="active" 
            {/if}>
            <a href="javascript:ustawFiltr('cena', null, false)">
            {if !isset($smarty.get.cena)}
            	<i class="icon-ok">
            {/if}
            </i>
            Dowolny budżet</a></li>
        {foreach from=$prices item=price}
        <li {if isset($smarty.get.cena) && $price['selected'] == 'true'}
                class="active" 
            {/if}><a href="javascript:ustawFiltr('cena', '{if isset($price['get_param'])}{$price['get_param']}{else}{$price['name']}{/if}', true)">
            {if isset($smarty.get.cena) && $price['selected'] == 'true'}
                     <i class="icon-ok">
                     {/if}
                     </i>
            
            {$price['name']}</a></li>
        {/foreach}
        -->
        
       <!-- <li class="nav-header">Kto idzie?</li>
        <li {if !isset($smarty.get.preferencja)}
                class="active" 
            {/if}><a href="javascript:ustawFiltr('preferencja', null, false)">
            {if !isset($smarty.get.preferencja)}
                     <i class="icon-ok"></i>
                     {/if}   
            Dowolnie</a></li>
        {foreach from=$preferences item=preference}
	        <li {if isset($smarty.get.preferencja) && $preference['selected'] == 'true'}
	                class="active" 
	            {/if}><a href="javascript:ustawFiltr('preferencja', '{$preference['name']}', false)">
                {if isset($smarty.get.preferencja) && $preference['selected'] == 'true'}
                     <i class="icon-ok">
                     {/if}
                     </i>
                {$preference['name']}</a></li>
        {/foreach} -->
    </ul>
</div>