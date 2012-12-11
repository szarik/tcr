<div id="gmap_lokal">
	<div class="name"> {$lokal->name} </div>
{if $lokal->photo}
	<div class="photo"><img src="{$lokal->photo}" alt="{$lokal->name}" title="{$lokal->name}"/></div> {/if}
	<div class="desc">
        {if $lokal->description && $lokal->description|strlen > 2}
            {$lokal->description}
        {else}
            Ten lokal nie posiada jeszcze opisu.
        {/if}
    </div>

    <div class="clearfix"></div>

{if $lokal->open_time && $lokal->open_time|strlen > 2}
	<div class="open_time"> <span></span> {$lokal->open_time} </div> {/if}
{if $lokal->address_street_name && $lokal->address_street_name|strlen > 2}
	<div class="address"> <span></span> {$lokal->address_street_name} </div> {/if}
{if $lokal->phone && $lokal->phone|strlen > 2}
	<div class="phone"> <span></span> {$lokal->phone} </div> {/if}
{if $lokal->email && $lokal->email|strlen > 2}
	<div class="email"> <span></span> {$lokal->email} </div> {/if}
{if $lokal->website && $lokal->website|strlen > 2}
	<div class="website"> <span></span> <a href="{$lokal->website}">{$lokal->website}</a> </div> {/if}

</div>