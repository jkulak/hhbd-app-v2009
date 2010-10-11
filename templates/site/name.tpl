{include file="site/part-site-title.tpl"}

<div id="maincontainer">

<div id="namenavbar">

{if $show_profile_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/profil">PROFIL</a>
</div>
{/if}

{if $show_album_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/albumy">ALBUMY</a>
</div>
{/if}

{if $show_guest_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/goscinnie">GOŚCINNIE</a>
</div>
{/if}

{if $show_rap_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/rap">RAP</a>
</div>
{/if}

{if $show_music_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/muzyka">MUZYKA</a>
</div>
{/if}

{if $show_scratch_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/skrecze">SKRECZE</a>
</div>
{/if}

{if $show_news_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/newsy">NEWSY</a>
</div>
{/if}

{if $show_concert_tab eq 1}
<div id="nametab" class="nametab">
<a href="/n/{$urlname}/imprezy">IMPREZY</a>
</div>
{/if}

<div id="nametab" class="nametab">
<a href="/n/{$urlname}/komentarze">KOMENTARZE</a>
</div>

</div>




<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/artists/{$photourl}" alt="{$photohint}" border="0">
<div id="fotosign">{$photohint}</div>
</div>

{if $hhbdurlname neq ""}
{if $realname neq ""}
<div id="lsh">NAZYWA SIĘ</div>
<div id="lsi">{$realname}</div>
{/if}
{/if}

{if $city neq ""}
<div id="lsh">MIASTO</div>
<div id="lsi">{$city}</div>
{/if}

{if $website neq ""}
<div id="lsh">STRONA OFICJALNA</div>
<div id="lsi">{$website}</div>
{/if}

{if $alsoknownas_list[0] neq ""}
<div id="lsh">ZNANY TAKŻE JAKO</div>
<div id="lsi">
<ul class="listanumerowana">
{foreach from=$alsoknownas_list item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>
{/if}

{if $top30 neq ""}
<div id="lsh">HHBD.PL TOP30</div>
<div id="lsi">
#{$top30}
</div>
{/if}


{if $projects_list[0] neq ""}
<div id="lsh">PROJEKTY</div>
<div id="lsi">
<ul class="listanumerowana">
{foreach from=$projects_list item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>
{/if}

{if $members_list[0] neq ""}
<div id="lsh">SKŁAD</div>
<div id="lsi">
<ul class="listanumerowana">
{foreach from=$members_list item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>
{/if}

{if $concertinfo neq ""}
<div id="lsh">INFO KONCERTOWE/booking</div>
<div id="lsi">{$concertinfo}</div>
{/if}

<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>wyświetleń: {$viewed}</li>
<li>komentarzy: {$commentcount}</li>
</UL>
</div>



</div>

<div id="rightcolumn">




<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$sectiontitle}</h1>
</div>
</div>


{if $add eq "profil"}
<div id="text" class="profil">
{$profile}
</div>
{/if}


{if $add eq "albumy"}

{section name=id loop=$ownalbum_ids_list}

<div id="name_news_header">
{$ownalbum_titles_list[id]}
</div>

<div id="name_news_body" class="name_news_read" style="	overflow: auto;">

<div id="name_album_thumb">
<a href="/a/{$ownalbum_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$ownalbum_covers_list[id]}" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: {$name}</li>
<li>wytwórnia: {$ownalbum_labels_list[id]}</li>
<li>rok wydania: {$ownalbum_years_list[id]}</li>
{if $ownalbum_sns_list[id] neq ""}<li>#kat: {$ownalbum_sns_list[id]}</li>{/if}
</ul>
</div>

<div id="name_album_buy">

</div>

</div>
{/section}

{section name=id loop=$album_ids_list}
<div id="name_news_header">
{$album_titles_list[id]}
</div>
<div id="name_news_body" class="name_news_read" >
<div id="name_album_thumb">
<a href="/a/{$album_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$album_covers_list[id]}" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: {$album_artists_list[id]}</li>
<li>wytwórnia: {$album_labels_list[id]}</li>
<li>rok wydania: {$album_years_list[id]}</li>
{if $album_sns_list[id] neq ""}<li>#kat: {$album_sns_list[id]}</li>{/if}
</ul>
</div>

<div id="name_album_buy">


</div>

</div>
{/section}

{/if}




{if $add eq "goscinnie"}
<ul class="listanumerowana">
{foreach from=$guest_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
{/if}

{if $add eq "skrecze"}
<ul class="listanumerowana">
{foreach from=$scratch_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
{/if}

{if $add eq "muzyka"}
<ul class="listanumerowana">
{foreach from=$music_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
{/if}

{if $add eq "rap"}
<ul class="listanumerowana">
{foreach from=$rap_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
{/if}

{if $add eq "imprezy"}
{section name=id loop=$concert_ids_list}
<div id="name_news_header" {$concert_done_list[id]}>
{$concert_titles_list[id]}
</div>
<div id="name_news_header_left">
{$concert_dates_list[id]} - {$concert_places_list[id]}
</div>
<div id="name_news_body" class="name_news_read">{$concert_descriptions_list[id]} <a href="/p/{$concert_ids_list[id]}" class="readmore">>></a></a></div>

{/section}
{/if}


{include file="site/part-news.tpl"}

{include file="site/part-comments.tpl"}

</div>

</div>

