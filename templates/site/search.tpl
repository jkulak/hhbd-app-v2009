<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer" style="text-align: justify;">
<div id="leftcolumn" style="line-height: 19px;">


<div id="lsh">WYNIKÓW WYSZUKIWANIA</div>
<div id="lsi">
<ul>
{$results}
</ul>
</div>

<div id="lsh">"{$searchstring}" SZUKANO</div>
<div id="lsi">
{$searched} razy
</div>

<div id="lsh">CZAS WYSZUKIWANIA</div>
<div id="lsi">
{$time} sekundy
</div>

</div>

<div id="rightcolumn">


{if $labels_list[0] neq ""}
<div id="name_news_header">WYTWÓRNIE</div>
<div id="name_news_body">
{section name=id loop=$labels_list}
<ul class="listanumerowana">
<li>{$labels_list[id]}</li>
</ul>
{/section}
</div>
{/if}

{if $albums_list[0] neq ""}
<div id="name_news_header">ALBUMY</div>
<div id="name_news_body">
{section name=id loop=$albums_list}
<ul class="listanumerowana">
<li>{$albums_list[id]}</li>
</ul>
{/section}
</div>
{/if}

{if $artists_list[0] neq ""}
<div id="name_news_header">WYKONAWCY</div>
<div id="name_news_body">
{section name=id loop=$artists_list}
<ul class="listanumerowana">
<li>{$artists_list[id]}</li>
</ul>
{/section}
</div>
{/if}

{if $songs_list[0] neq ""}
<div id="name_news_header">UTWORY</div>
<div id="name_news_body" style="text-transform: Capitalize;">
{section name=id loop=$songs_list}
<ul class="listanumerowana">
<li>{$songs_list[id]}</li>
</ul>
{/section}
</div>
{/if}

{if $users_list[0] neq ""}
<div id="name_news_header">UŻYTKOWNICY</div>
<div id="name_news_body" style="text-transform: Capitalize;">
{section name=id loop=$users_list}
<ul class="listanumerowana">
<li>{$users_list[id]}</li>
</ul>
{/section}
</div>
{/if}

{if $sns_list[0] neq ""}
<div id="name_news_header">ALBUMY PO NUMERACH KATALOGOWYCH</div>
<div id="name_news_body" style="text-transform: Capitalize;">
{section name=id loop=$sns_list}
<ul class="listanumerowana">
<li>{$sns_list[id]}</li>
</ul>
{/section}
</div>
{/if}




</div>
</div>