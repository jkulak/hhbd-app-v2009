<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">


<div class="m_l" style="text-transform: uppercase">

<div class="m_ln">
<strong>NAJPOPULARNIEJSZE</strong>

</div>




<div class="m_ln">
<div class="m_lh">WYKONAWCY</div>
<ul class="listanumerowana">
{section name=id loop=$mp_artists}
<li>{$mp_artists[id]}</li>
{/section}
</ul>
</div>

<div class="m_ln">
<div class="m_lh">WYTWÓRNIE</div>
<ul class="listanumerowana">
{section name=id loop=$mp_labels}
<li>{$mp_labels[id]}</li>
{/section}
</ul>
</div>

<div class="m_ln">
<div class="m_lh">UTWORY</div>
<ul class="listanumerowana">
{section name=id loop=$mp_songs}
<li>{$mp_songs[id]}</li>
{/section}
</ul>
</div>

<div class="m_ln">
<div class="m_lh">IMPREZY</div>
<ul class="listanumerowana" style="text-align: left;">
{section name=id loop=$mp_concerts}
<li>{$mp_concerts[id]}</li>
{/section}
</ul>
</div>

<!--
<div class="m_ln">
<div class="m_lh">NEWSY</div>
<ul class="listanumerowana">
{section name=id loop=$mp_news}
<li>{$mp_news[id]}</li>
{/section}
</ul>
</div>
-->




</div>

<div class="m_r">


<div class="m_rl">


<div class="m_rbox">
<div class="m_rh">NAJWYŻEJ OCENIANE</div>
{section name=id loop=$album_ids_list}
<div class="m_rac">
<div id="name_album_thumb">
<a href="/a/{$album_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$album_covers_list[id]}" border="0"></a>
</div>
<div class="m_rai">
<ul>
<li>{$album_artists_list[id]}</li>
<li>"{$album_titles_list[id]}"</li>
<li>{$album_labels_list[id]}</li>
<li>{$album_years_list[id]}</li>
<li>ocena: <strong>{$album_ratings_list[id]}/10</strong></li>
</ul>
</div>
</div>
{/section}


</div>

</div>

<div class="m_rr">


<div class="m_rbox">
<div class="m_rh">NAJPOPULARNIEJSZE</div>
{section name=id loop=$albumpop_ids_list}
<div class="m_rac">
<div id="name_album_thumb">
<a href="/a/{$albumpop_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$albumpop_covers_list[id]}" border="0"></a>
</div>
<div class="m_rai">
<ul>
<li>{$albumpop_artists_list[id]}</li>
<li>"{$albumpop_titles_list[id]}"</li>
<li>{$albumpop_labels_list[id]}</li>
<li>{$albumpop_years_list[id]}</li>
<li>odwiedzin: <strong>{$albumpop_ratings_list[id]}</strong></li>
</ul>
</div>
</div>
{/section}

</div>



</div>




</div>
</div>


