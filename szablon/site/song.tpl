{include file="site/part-site-title.tpl"}

<div id="maincontainer">

<div id="leftcolumn">

{if $length neq ""}<div id="lsh">CZAS TRWANIA</div><div id="lsi">{$length}</div>{/if}

{if $rap[0] neq ""}<div id="lsh">RAP</div><div id="lsi"><ul  class="listanumerowana">
{section name=id loop=$rap}<li>{$rap[id]}</li>{/section}</ul></div>{/if}

{if $music[0] neq ""}<div id="lsh">MUYZKA</div><div id="lsi"><ul class="listanumerowana">
{section name=id loop=$music}<li>{$music[id]}</li>{/section}</ul></div>{/if}

{if $feat[0] neq ""}<div id="lsh">GOŚCINNIE</div><div id="lsi"><ul class="listanumerowana">
{section name=id loop=$feat}<li>{$feat[id]}</li>{/section}</ul></div>{/if}

{if $scratch[0] neq ""}<div id="lsh">SKRECZE / CUTY</div><div id="lsi"><ul class="listanumerowana">
{section name=id loop=$scratch}<li>{$scratch[id]}</li>{/section}</ul></div>{/if}


<div id="lsh">INFO</div><div id="lsi"><UL>
<li>wyświetleń: {$viewed}</li>
</UL></div>

</div>



<div id="rightcolumn">

<div id="name_news_header">NA ALBUMACH</div>
<div id="name_news_body" class="name_news_read">

<ul class="listanumerowana">
{foreach from=$onalbums item=curr}
<li>{$curr}</li>
{/foreach}
</ul>

</div>




<div id="name_news_header">WYKORZYSTANE SAMPLE</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">
{foreach from=$samples item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
{if $hhbdlogin neq ""}<li class="itemnumerowany"><a href="/dodajsampel/{$urlname}">DODAJ SAMPEL</a></li>{/if}
{if $hhbdlogin eq ""}<li class="itemnumerowany">ZALOGUJ SIĘ BY DODAĆ SAMPEL</li>{/if}
</ul>
</div>


{if $lyrics neq ""}
<div id="name_news_header">TEKST</div>
<div id="name_news_body" class="name_news_read">{$lyrics}</div>
{/if}


</div>

</div>