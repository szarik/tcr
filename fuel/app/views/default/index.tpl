{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- index.tpl start --> {/if}
{$doctype|default:'<!DOCTYPE html>'}
<html>
<head>
    <meta charset='utf-8'>
    <title>{$title|default:'Imprezy Wrocław, Wydarzenia Wrocław'} - To co robimy.pl?</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

    {$assets|default:''}{$assets_external|default:''}<!--[if IE]>
    {$cssie|default:''}<![endif]-->

    <script type="text/javascript">
        $(function(){
            mapaStart();
        });
    </script>

</head>
<body>

{include file="$theme/header.tpl"}



<div class="container">

    <div class="row-fluid">
        <div class="span3">
        {include file="$theme/sidebar_nav.tpl"}
        </div>

        <div class="span9">
        {include file="$theme/tabs.tpl"}
        </div>

    </div>
</div>


</body>
</html>
{if isset($config.theme_show_comments) && $config.theme_show_comments == 1} <!-- index.tpl end --> {/if}