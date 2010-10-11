{include file="site/part-site-title.tpl"}

<div id="maincontainer">

<div id="namenavbar">

<div id="nametab" class="nametab">
<a href="/p/{$urlname}">INFORMACJE</a>
</div>

{if $show_news_tab eq 1}
<div id="nametab" class="nametab">
<a href="/p/{$urlname}/newsy">NEWSY</a>
</div>
{/if}

<div id="nametab" class="nametab">
<a href="/p/{$urlname}/komentarze">KOMENTARZE</a>
</div>


</div>

<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/posters/{$poster}">
</div>

<div id="lsh">DATA</div><div id="lsi">{$date}</div>
<div id="lsh">MIASTO</div><div id="lsi">{$city}</div>
{if $website neq ""}<div id="lsh">STRONA OFICJALNA</div><div id="lsi">{$website}</div>{/if}
{if $place neq ""}<div id="lsh">MIEJSCE</div><div id="lsi">{$place}</div>{/if}
{if $start neq ""}<div id="lsh">START</div><div id="lsi">{$start}</div>{/if}
{if $cost neq ""}<div id="lsh">CENA</div><div id="lsi">{$cost}</div>{/if}

<div id="lsh">INFO</div><div id="lsi"><UL>
<li>wyświetleń: {$viewed}</li>
<li>komentarzy: {$commentcount}</li>
<li>dodany: {$added}</li>
</UL></div>

</div>



<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$sectiontitle}</h1>
</div>
</div>

{if $add eq "informacje"}
<div id="name_news_header">WYKONAWCY</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">
{foreach from=$concert_artists_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>

{if $cdescription neq ""}
<div id="name_news_header">OPIS IMPREZY</div>
<div id="name_news_body" class="name_news_read">{$cdescription}</div>
{/if}
{/if}


{include file="site/part-news.tpl"}

{include file="site/part-comments.tpl"}

</div>

</div>