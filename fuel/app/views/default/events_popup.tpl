<div id="form-event" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    {$event_messages|default:''}
	{$form_event|default:''}
</div>
<div id="form-place" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    {$place_messages|default:''}
	{$form_place|default:''}
</div>


<div style="display:none">
<div id="form-event2">
{$event_messages|default:''}
	{$form_event|default:''}
</div>
</div>

<div style="display:none">
<div id="form-place2">
{$place_messages|default:''}
	{$form_place|default:''}
</div>
</div>

<a class="inline" href="#form-event2"> test </a>