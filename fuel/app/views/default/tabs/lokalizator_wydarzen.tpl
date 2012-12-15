<div class="tab-pane {if isset($smarty.get.strona) && $smarty.get.strona == "lokalizator_wydarzen"}active{/if}" id="tab5">

{$lokalizator_wydarzen_javascript|default:''}
{$lokalizator_wydarzen_html|default:''}

	<script type="text/javascript">
        {literal}
		$(function () {
			$("a[href='#tab5']").click(function () {
				setTimeout(function () {
					if ($('#tab5').is(":visible")) {
						var center = map_lokalizator_wydarzen.getCenter();
						parent.google.maps.event.trigger(map_lokalizator_wydarzen, "resize");
						map_lokalizator_wydarzen.setCenter(center);
					}
				}, 100);
			});
		});
        {/literal}
	</script>

</div>