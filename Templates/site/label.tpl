{include file="site/part-site-title.tpl"}

<div id="maincontainer">

<div id="namenavbar">

{if $show_profile_tab eq 1}
<div id="nametab" class="nametab">
<a href="/l/{$urlname}/profil">PROFIL</a>
</div>
{/if}

{if $show_discog_tab eq 1}
<div id="nametab" class="nametab">
<a href="/l/{$urlname}/wydawnictwa">WYDAWNICTWA</a>
</div>
{/if}

{if $show_news_tab eq 1}
<div id="nametab" class="nametab">
<a href="/l/{$urlname}/newsy">NEWSY</a>
</div>
{/if}

{if $show_concert_tab eq 1}
<div id="nametab" class="nametab">
<a href="/l/{$urlname}/imprezy">IMPREZY</a>
</div>
{/if}

<div id="nametab" class="nametab">
<a href="/l/{$urlname}/komentarze">KOMENTARZE</a>
</div>

</div>




<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/labels/{$logo}" border="0">
</div>

{if $city neq ""}
<div id="lsh">MIASTO</div>
<div id="lsi">{$city}</div>
{/if}

{if $website neq ""}
<div id="lsh">STRONA OFICJALNA</div>
<div id="lsi">{$website}</div>
{/if}

{if $email neq ""}
<div id="lsh">E-MAIL</div>
<div id="lsi">{$email}</div>
{/if}

{if $addres neq ""}
<div id="lsh">ADRES</div>
<div id="lsi">{$addres}</div>
{/if}


<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>wydanych albumów: {$discogs_count}</li>
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



{if $add eq "wydawnictwa"}
<table  width="496" border="0" cellspacing="3" cellpadding="4">

<tr bgcolor="#575757">
<td width="1px"><b><font color="#FFFFFF">ROK</font></b></td><td><b><font color="#FFFFFF">ALBUM</font></b></td><td><b><font color="#FFFFFF">#KAT</font></b></td>
</tr>

{section name=id loop=$label_discogs_list}
<tr bgcolor="#E7E7E7">
<td width="1px">{$label_years_list[id]}</td><td>{$label_discogs_list[id]}</td><td>{$label_nums_list[id]}</td>
</tr>
{/section}

</table>
{/if}

{include file="site/part-news.tpl"}

{include file="site/part-comments.tpl"}

</div>

</div>

