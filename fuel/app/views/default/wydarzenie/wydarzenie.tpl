{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl start --> {/if}
<!--
<div class="container">
<div class="span8">
{foreach from=$events item=event}
{if $id_wydarzenia == $event->id and $event->visible == 1}
{foreach from=$places item=place}
{if $event->place_id == $place->id}
{$miejsce = $place->name}
{$id_miejsce = $place->id}
<ul class="breadcrumb">
<li><a href="../../">Wydarzenia</a> <span class="divider">/</span></li>
<li><a href="../../miejsca/miejsce/{$place->id}">{$place->name}</a> <span class="divider">/</span></li>
<li class="active">{$event->name}</li>
</ul>
<h1>{$event->name}</h1>
<div class="span4">
<img src="{$event->link_photo}" alt="" class="img-polaroid">
</div>
<div class="span6">
<dl class="dl-horizontal">
{if isset($event->place_id)}
<dt>Miejsce</dt>
<dd><a href="../../miejsca/miejsce/{$place->id}">{$miejsce}</a></dd>
{/if}
{if isset($event->coordinates)}
<dt>Lokalizacja</dt>
<dd>{$event->coordinates}</dd>
{/if}
{if isset($event->date_start)}
<dt>Rozpoczęcie</dt>
<dd>{$event->date_start}</dd>
{/if}
{if isset($event->date_end)}
<dt>Zakończenie</dt>
<dd>{$event->date_end}</dd>
{/if}
{if isset($event->preferences)}
<dt>Preferencje</dt>
<dd>{$event->preferences}</dd>
{/if}
</dl>
</div>
<div class="span10">
{$event->description}</div>
<div class="span10">
{if isset($event->link)}
<dl class="dl-horizontal">
<dt>Źródło:</dt>
<dd>{$event->link}</dd>
</dl></div>
{/if}
{/if}
{/foreach}
{/if}
</div>
{if $id_wydarzenia == $event->id and $event->visible != 1}
<h1>Podane wydarzenie zostało usunięte</h1>
{/if}
{/foreach}
</div>
</div> -->

<div class="container">
<div class="span8">
{foreach from=$events item=event}
{if $id_wydarzenia == $event->id and $event->visible == 1}
{foreach from=$places item=place}
{if $event->place_id == $place->id}
{$miejsce = $place->name}
{$id_miejsce = $place->id}
<ul class="breadcrumb">
<li><a href="/">Wydarzenia</a> <span class="divider">/</span></li>
{if !empty($event->category_id)}
<li><a href="/wydarzenia/strona/1?kategoria={$event->category_name}">
{foreach from=$event_categories item=category}
{if $event->category_id == $category['id']}
{$category['name']}
{/if}
{/foreach}
</a> <span class="divider">/</span></li>
{/if}
<li><a href="../../miejsca/miejsce/{$place->id}">{$place->name}</a> <span class="divider">/</span></li>
<li class="active">{$event->name}</li>
</ul>
<h1>{$event->name}</h1>
<div class="span4">
<img src="{$event->link_photo}" alt="" class="img-polaroid">
</div>
<div class="span6">
<dl class="dl-horizontal">
{if isset($event->place_id)}
<dt>Miejsce</dt>
<dd><a href="../../miejsca/miejsce/{$place->id}">{$miejsce}</a></dd>
{/if}
{if isset($event->coordinates)}
<dt>Lokalizacja</dt>
<dd>{$event->coordinates}</dd>
{/if}
{if isset($event->date_start)}
<dt>Rozpoczęcie</dt>
<dd>{$event->date_start|date_format:"%A, %H:%M %e-%m-%Y"|replace:'Monday':'Poniedziałek'|replace:'Tuesday':'Wtorek'|replace:'Wednesday':'Środa'|replace:'Thursday':'Czwartek'|replace:'Friday':'Piątek'|replace:'Saturday':'Sobota'|replace:'Sunday':'Niedziela'}</dd>
{/if}
{if isset($event->date_end)}
<dt>Zakończenie</dt>
<dd>{$event->date_end|date_format:"%A, %H:%M %e-%m-%Y"|replace:'Monday':'Poniedziałek'|replace:'Tuesday':'Wtorek'|replace:'Wednesday':'Środa'|replace:'Thursday':'Czwartek'|replace:'Friday':'Piątek'|replace:'Saturday':'Sobota'|replace:'Sunday':'Niedziela'}</dd>
{/if}
{if isset($event->preferences)}
<dt>Preferencje</dt>
<dd>{$event->preferences}</dd>
{/if}
</dl>
</div><div class="span10">
{$event->description}</div>
<div class="span10">
{if isset($event->link)}
<dl class="dl-horizontal">
<dt>Źródło:</dt>
<dd><a href="{$event->link}" title="{$event->name}">{$event->link}</a></dd>
</dl></div>{/if}
{/if}
{/foreach}
{/if}
{if $id_wydarzenia == $event->id and $event->visible != 1}
<h1>Podane wydarzenie zostało usunięte</h1>
{/if}
{/foreach}
</div>
</div>

{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- wydarzenie.tpl end --> {/if}