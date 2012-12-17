<div id="gmap_lokal">
	<div class="name"> {$wydarzenie->name} </div>
{if isset($wydarzenie->link_photo)}
	<div class="photo"><img src="{$wydarzenie->link_photo}" alt="{$wydarzenie->name}" title="{$wydarzenie->name}"/></div> {/if}
	<div class="desc">
    {if $wydarzenie->description && $wydarzenie->description|strlen > 2}
        {$wydarzenie->description}
        {else}
		To wydarzenie nie posiada jeszcze opisu.
    {/if}
	</div>

	<div class="clearfix"></div>

{if isset($wydarzenie->link)}
	<div class="additional">
		<h1> <a href="{$wydarzenie->link}" alt="szczegóły"> zobacz szczegóły wydarzenia </a> </h1>
	</div>
{/if}
	<div> </div>

</div>