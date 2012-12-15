<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator"}active{/if}" id="tab2">

{$lokalizator_javascript|default:''}
{$lokalizator_html|default:''}

	<script type="text/javascript">
        {literal}
		$(function () {
			$("a[href='#tab2']").click(function () {
				setTimeout(function () {
					if ($('#tab2').is(":visible")) {
						var center = map_lokalizator.getCenter();
						parent.google.maps.event.trigger(map_lokalizator, "resize");
						map_lokalizator.setCenter(center);
					}
				}, 100);
			});
		});
        {/literal}
	</script>

</div>