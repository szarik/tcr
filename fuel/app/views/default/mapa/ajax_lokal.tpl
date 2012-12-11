<div id="gmap_lokal">
	<div class="name"> {$lokal->name} </div>
{if $lokal->photo}
	<div class="photo"><img src="{$lokal->photo}" alt="{$lokal->name}" title="{$lokal->name}"/></div> {/if}
{if $lokal->description}
	<div class="desc"> {$lokal->description} </div> {/if}

{if $lokal->open_time}
	<div class="open_time"> <span></span> {$lokal->open_time} </div> {/if}
{if $lokal->address_street_name}
	<div class="address"> <span></span> {$lokal->address_street_name} </div> {/if}
{if $lokal->phone}
	<div class="phone"> <span></span> {$lokal->phone} </div> {/if}
{if $lokal->email}
	<div class="email"> <span></span> {$lokal->email} </div> {/if}
{if $lokal->website}
	<div class="website"> <span></span> <a href="{$lokal->website}">{$lokal->website}</a> </div> {/if}
</div>