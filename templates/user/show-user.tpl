<div id="sitetitle">
<div id="titleleft">
<h1>użytkownik: {$ctitle}</h1>
</div>
</div>

<div id="maincontainer">


<div id="namenavbar">

{if $show_reviews_tab eq 1}
<div id="nametab" class="nametab">
<a href="/u/{$urlname}/recenzje">RECENZJE</a>
</div>
{/if}

{if $show_wishlist_tab eq 1}
<div id="nametab" class="nametab">
<a href="/u/{$urlname}/chcelista">CHCĘLISTA</a>
</div>
{/if}

{if $show_collection_tab eq 1}
<div id="nametab" class="nametab">
<a href="/u/{$urlname}/kolekcja">KOLEKCJA</a>
</div>
{/if}

{if $show_ratings_tab eq 1}
<div id="nametab" class="nametab">
<a href="/u/{$urlname}/oceny">OCENY</a>
</div>
{/if}

{if $show_samples_tab eq 1}
<div id="nametab" class="nametab">
<a href="/u/{$urlname}/sample">SAMPLE</a>
</div>
{/if}

<div id="nametab" class="nametab">
<a href="/u/{$urlname}/wyslijwiadomosc">WYŚLIJ WIADOMOŚĆ</a>
</div>

</div>




<div id="leftcolumn">

<div id="lsh">Konto utworzone</div>
<div id="lsi">{$added}</div>

{if $age neq ""}
<div id="lsh">wiek</div>
<div id="lsi">{$age}</div>
{/if}

{if $place neq ""}
<div id="lsh">miasto</div>
<div id="lsi">{$place}</div>
{/if}

{if $about neq ""}
<div id="lsh">PROFIL</div>
<div id="lsi">{$about}</div>
{/if}

{if $reviews_count neq ""}
<div id="lsh">DODANYCH RECENZJI</div>
<div id="lsi">{$reviews_count}</div>
{/if}

{if $collection_count neq ""}
<div id="lsh">albumów w kolekcji</div>
<div id="lsi">{$collection_count}</div>
{/if}

{if $wishlist_count neq ""}
<div id="lsh">albumów w chcęliście</div>
<div id="lsi">{$wishlist_count}</div>
{/if}

{if $samples_count neq ""}
<div id="lsh">INFO O SAMPLACH</div>
<div id="lsi">{$samples_count}</div>
{/if}





</div>



<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$sectiontitle}</h1>
</div>
</div>

{if $add eq "chcelista"}
<ul class="listanumerowana">
{section name=id loop=$wishlist}
<li class="itemnumerowany">{$wishlist[id]}</li>
{/section}
</ul>
{/if}


{if $add eq "kolekcja"}
<ul class="listanumerowana">
{section name=id loop=$collection}
<li class="itemnumerowany">{$collection[id]}</li>
{/section}
</ul>
{/if}


{if $add eq "recenzje"}
{section name=id loop=$review_dates_list}
<div id="box" style="width: 486px;">
{$review_artists_list[id]} - {$review_albums_list[id]}
<p>
<ul>
<li><strong>{$review_titles_list[id]}</strong></li>
<li>{$review_texts_list[id]}</li>
<li class="sig">{$review_dates_list[id]}</li>
</ul>
</p>

</div>
{/section}
{/if}




{if $add eq "sample"}
{section name=id loop=$sample_dates_list}
<div id="box" style="width: 486px;">

<ul>
<li>album: {$sample_albums_list[id]}</li>
<li>piosenka: {$sample_songs_list[id]}</li>
<li>sampel z: <strong>{$sample_infos_list[id]}</strong></li>
<li class="sig">{$sample_dates_list[id]}</li>
</ul>
</div>
{/section}
{/if}

{if $add eq "oceny"}
<strong>WYKONAWCA - TYTUŁ ALBUMU: OCENA</strong>
<p>
<ul class="listanumerowana">
{section name=id loop=$ratings}
<li class="itemnumerowany">{$ratings[id]}</li>
{/section}
</ul>
</p>
{/if}



</div>

</div>

