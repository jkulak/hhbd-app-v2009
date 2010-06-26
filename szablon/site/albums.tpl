<div id="sitetitle">
<div id="titleleft">
<h1>{$subtitle}</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
{$switch}
</div>


<ul class="listanumerowana">
{foreach from=$concerts item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>

{section name=id loop=$ownalbum_ids_list}

<div id="name_news_header">
{$ownalbum_titles_list[id]}
</div>

<div id="name_news_body" class="name_news_read">

<div id="name_album_thumb">
<a href="/a/{$ownalbum_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$ownalbum_covers_list[id]}" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: {$ownalbum_artists_list[id]}</li>
<li>wytwórnia: {$ownalbum_labels_list[id]}</li>
<li>{$ownalbum_years_list[id]}</li>
{if $ownalbum_sns_list[id] neq ""}<li>#kat: {$ownalbum_sns_list[id]}</li>{/if}
</ul>
</div>

<div id="name_album_buy">

</div>

</div>

{/section}

<div id="letterswitch" class="letterswitch">
{$switch}
</div>

