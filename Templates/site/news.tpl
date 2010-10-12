{include file="site/part-site-title.tpl"}
<div id="maincontainer">

<div id="leftcolumn">


<div id="lsh">SKRÓT NEWSÓW</div>
<div id="lsi">


{section name=id loop=$news_dates_list}
<div id="news_short">
<h3>{$news_titles_list[id]}</h3>
<div id="newssign">{$news_dates_list[id]}</div>
<div id="news_image"><a href="/news/{$news_ids_list[id]}"><img src="/imgs/database/news-glyphs/{$news_glyphs_list[id]}" border="0"></a></div>
{$news_list[id]}</i></strong></b>
<div id="news_info">[czytany: {$news_reads_list[id]}, komentarzy: {$news_comments_list[id]}]</div>
<div id="hr"></div>

<hr>
</div>
{/section}


</div>


</div>

<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$subtitle}</h1>
</div>
</div>

<div id="name_news_body">


<div id="news_image">
<a href="#" onClick="window.open('/imgs/database/news/{$img}','_blank','');">
<img src="/imgs/database/news-thumbs/{$newsimg}" border="0">
</a>
</div>


<div id="news_main_news"  class="profil">
{$news}
</div>

<div id="newssign">dodany przez: <strong>{$addedby}</strong> ({$added}), wyswietleń: {$viewed}</div>

</div>
<!--
<div id="name_news_header">KOMENTARZE (NIŻEJ NA STRONIE)</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">

<li><a href="#c">Czytaj</a></li>
<li><a href="#ac">Dodaj</a></li>

</ul>
</div>
-->

{if $refartists neq "" OR $reflabels neq "" OR $refconcerts neq ""}
<div id="name_news_header">POWIĄZANE LINKI</div>
<div id="tracklist">
<ul class="listanumerowana">
{if $refartists neq ""}<li>{$refartists}</li>{/if}
{if $reflabels neq ""}<li>{$reflabels}</li>{/if}
{if $refconcerts neq ""}<li>{$refconcerts}</li>{/if}
</ul>
</div>
{/if}


{if $refalbums[0] neq ""}
<div id="name_news_header">POWIĄZANE ALBUMY</div>
<div id="name_news_body" class="name_news_read">
{section name=id loop=$refalbums}
{$refalbums[id]}
{/section}
</div>
{/if}

<!--
<div id="name_news_header">NAJPOPULARNIEJSZE NEWS'Y</div>
<div id="name_news_body" class="name_news_read">
<table width="480" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="240" valign="top"><ul>{section name=id loop=$titles}
<li>{$titles[id]}<div id="newssign">dodany: {$added1[id]}</div></li>
{/section}</ul></td>
    <td width="240" valign="top"><ul>{section name=id loop=$titles2}
<li>{$titles2[id]}<div id="newssign">dodany: {$added2[id]}</div></li>
{/section}</ul></td>
  </tr>
</table>



</div>
-->


<a name="c"><div id="name_news_header">KOMENTARZE</div></a>
{section name=id loop=$comments_list}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
{$comments_list[id]}
</div>
<div id="commentbox_sig" class="sig">

dodany: <strong>
{if $comments_autor_ids_list[id] neq ""}
<a href="/u/{$comments_autor_ids_list[id]}">{$comments_autors_list[id]}</a>
{else if}
{$comments_autors_list[id]}
{/if}

</strong> ({$comments_dates_list[id]})

</div>
</div>
{/section}

<a name="ac"><div id="commentbox"></a>

<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-news-comment.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="{$id}">
<input type="hidden" name="type" value="{$s}">
<input type="hidden" name="urlname" value="{$urlname}">
<textarea name="comment" lines="3" class="commentta"></textarea>
<div style="float: left;">
{if $hhbdlogin neq ""}
<input type="hidden" name="addedby" value="{$hhbdlogin}">
<input type="hidden" name="addedbyurlname" value="{$hhbdurlname}">
{else}
<strong>PODPIS:</strong><input type="text" name="addedby" class="commentinput">
{/if}
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">
Dodaj swój komentarz, lecz pamiętaj, że razem z Twoją wypowiedzią zostanie zapisany Twój adres IP oraz nazwa host'a ({$host}). W przypadku naruszenia czyichkolwiek dóbr osobistych informacja ta będzie udostępniona odpowiednim organom.
</div>
</div>
</div>


</div>
</div>
