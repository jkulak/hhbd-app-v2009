<h1>{$album->artist->name} - {$album->title}</h1>

<div id="brief">
	<h2 class="hide">Informacje podstawowe</h2>
	<div id="picture">
	  <img src="{$album->cover}" alt="Okładka albumu {$album->artist->name} - {$album->title}" class="image" />
		<span id="case"></span>
	</div>
	<ul class="essential">
		<li>Wykonawca: {$album->artist->name}</li>
		<% if @album.release_date? %><li><% if @album.released? %>Data<% else %>Planowana data<% end %> wydania: <%= @album.premiere %></li><% end %>
		<li>Wytwórnia: <%= label_linking_name(@album.label) %></li>
		<% if !@album.catalog_number.blank? %><li>Numer katalogowy: <%= @album.catalog_number %></li><% end %>
		<% if !@album.media_types[@album.media].nil? %><li>Nośnik: <%= @album.media_types[@album.media] %></li><% end %>
	</ul>
	
	<ul class="additional">
		<li class="hide">W chcęliście: <%= @album.created_at %></li>
		<li class="hide">W kolekcji: <%= @album.created_at %></li>
		<li>Dodany: <%= @album.created_at.strftime('%d %B %Y') %></li>
		<% if !@album.creator.blank? %><li>Dodany przez: <%= @album.creator.login %></li><% end %>
		<% if admin? %>
			<% if !@album.updated_at.nil? %><li>Ostatnio edytowany: <%= @album.updated_at.strftime('%d %B %Y') %></li><% end %>
			<% if !@album.editor.blank? %><li>Ostatnio edytowany przez: <%= @album.editor.login %></li><% end %>
			<li>Wyświetleń: <%= @album.viewed %></li>
		<% end %>
	</ul>

</div>

<div id="main">
<% if !@album.songs.blank? %>
	<h2>Lista utworów</h2>
	<%= render :partial => "songs/list", :object => @album.songs %>
<% end %>
<% if !@album.description.blank? %>
	<h2>Opis produkcji</h2>
	<div class="info"><%= @album.description %></div>
<% end %>
	
	<h2 class="hide">Komentarze</h2>
	<ul id="comments" class="hide">
		<li>pierwszy</li>
		<li>drugi</li>
		<li>trzeci</li>
	</ul>
</div>
<% if admin? %>
<div class="admin">
	<%= link_to 'Edytuj album', edit_album_path(@album) %>
</div>
<% end %>





{include file="site/part-site-title.tpl"}
<div id="maincontainer">
<div id="namenavbar">
<div id="nametab" class="nametab">
<a href="/a/{$urlname}">INFO</a>
</div>
{if $show_description_tab eq 1}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/opis">OPIS</a>
</div>
{/if}
{if $show_tracklist_tab eq 1}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/lista">SZCZEGӣOWA LISTA</a>
</div>
{/if}
{if $hhbdurlname neq "" OR $show_reviews_tab eq 1}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/recenzje">RECENZJE</a>
</div>
{/if}
{if $show_ratings_tab eq 1}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/oceny">OCENY</a>
</div>
{/if}
{if $show_news_tab eq 1}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/newsy">NEWSY</a>
</div>
{/if}
<div id="nametab" class="nametab">
<a href="/a/{$urlname}/komentarze">KOMENTARZE</a>
</div>
</div>
<div id="leftcolumn">
<div id="main_picture">
<img src="/imgs/database/albums/{$cover}" border="0" alt="{$imagealt}">
</div>
{if $artist neq ""}
<div id="lsh">WYKONAWCA</div>
<div id="lsi">{$artist}</div>
{/if}
{if $year neq ""}
<div id="lsh">PREMIERA</div>
<div id="lsi">{$year}</div>
{/if}
{if $premier neq ""}
<div id="lsh" style="color: red;">PLANOWANA PREMIERA</div>
<div id="lsi" >{$premier}</div>
{/if}
{if $label neq ""}
<div id="lsh">WYTWÓRNIA</div>
<div id="lsi">{$label}</div>
{/if}
{if $catalog_cd neq ""}
<div id="lsh">NUMER KATALOGOWY</div>
<div id="lsi">{$catalog_cd}</div>
{/if}
{if $top10 neq ""}
<div id="lsh">HHBD.PL TOP10</div>
<div id="lsi">
#{$top10}
</div>
{/if}
{if $album_singles_list[0] neq ""}
<div id="lsh">POPRZEDZONY SINGLAMI</div>
<div id="lsi">
<ul class="listanumerowana">
{foreach from=$album_singles_list item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>
{/if}
{if $epfor neq ""}
<div id="lsh">SINGIEL DO ALBUMU</div>
<div id="lsi">
{$epfor}
</div>
{/if}

{if $promomix neq ""}
<div id="lsh">PROMOMIX</div>
<div id="lsi">{$promomix}</div>
{/if}



{if $length neq ""}
<div id="lsh">CZAS TRWANIA</div>
<div id="lsi">{$length}</div>
{/if}

{if $album_shops_list[0] neq ""}
<div id="lsh">KUP ALBUM</div>
<div id="lsi">
<ul class="listanumerowana">
{foreach from=$album_shops_list item=curr}
<li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
</div>
{/if}


<div id="lsh">OCEŃ {$ratingpic}</div>
<div id="lsi">
<ul>
<li>{$rate}</li>
<li>{$myrate}</li>
</ul>
</div>

<div id="lsh">PERSONALIZACJA</div>
<div id="lsi">
<ul>
<li>{$percoll}</li>
<li>{$perwish}</li>
</ul>

</div>


<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>w <a href="/kolekcja/{$urlname}">kolekcji</a>: {$collcount} użytkowników</li>
<li>w <a href="/chcelista/{$urlname}">chcęliście</a>: {$wishcount} użytkowników</li>
<li>wyświetleń: {$viewed}</li>
</UL>
</div>
</div>
<div id="rightcolumn">
<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$sectiontitle}</h1>
</div>
</div>

{if $add eq "informacje"}
	
	{if $shortartistabout neq ""}
	<div id="name_news_header">
	{$artist} O SWOJEJ PŁYCIE
	</div>
	<div id="text" class="profil">{$shortartistabout}</div>
	{/if}
	
	
	{if $show_tracklist_tab eq 1}
	<div id="name_news_header">TRAKLSITA</div>
	<div id="tracklist">
	<ul>
	
	{section name=id loop=$album_tracks_list}
	{strip}
	
	
	
	
	
	
	
	<div id="stc" style="width: 492px; background-color: {cycle values="#EEEEEE,#F8F8F8"}">
<div id="st">{$album_tracks_list[id]}</div>
{if $album_samples_list[id] neq "0"}
<div id="std"><img src="/imgs/layout/sample.gif"></div>
{/if}
{if $album_lalalabs_list[id] neq "0"}
<div id="std"><a href="/lalalab/{$album_lalalabs_list[id]}" target="_blank"><img src="/imgs/layout/lalalab.gif" border="0" alt="Pobierz dzwonek z Lalalab.pl"></a></div>
{/if}
{if $album_clips_list[id] neq ""}
<div id="std"><img src="/imgs/layout/clip.gif"></div>
{/if}	
	

	</div>
	{/strip}
	{/section}
	
	</ul>
	</div>
	{/if}
	
	{if $shortdesc neq ""}
	<div id="name_news_header">
	OPIS ALBUMU
	</div>
	<div id="text" class="profil">{$shortdesc}</div>
	{/if}
	
	
{/if}



{if $add eq "opis"}
	{if $artistabout neq ""}
		<div id="name_news_header">
		{$artist} O SWOJEJ PŁYCIE
		</div>
		<div id="text" class="profil">{$artistabout}</div>	
		{/if}
	
	{if $albumdescription neq ""}
		<div id="name_news_header">OPIS</div>
		<div id="text" class="profil">{$albumdescription}</div>
		{/if}
	
	{/if}

{if $add eq "lista"}

<div id="sd">rap</div>
<div id="sd">muzyka</div>
<div id="sd">goscinnie</div>
<div id="sd">skrecze / cuty</div>

{section name=id loop=$album_tracks_list}
<div id="stc">
<div id="st">{$album_tracks_list[id]}</div>
{if $album_samples_list[id] neq "0"}
<div id="std"><img src="/imgs/layout/sample.gif"></div>
{/if}
{if $album_lalalabs_list[id] neq "0"}
<div id="std"><a href="/lalalab/{$album_lalalabs_list[id]}" target="_blank"><img src="/imgs/layout/lalalab.gif" border="0" alt="Pobierz dzwonek z Lalalab.pl"></a></div>
{/if}
{if $album_clips_list[id] neq ""}
<div id="std"><img src="/imgs/layout/clip.gif"></div>
{/if}
 
</div>


{if $album_details[id][2][0] neq ""}
<div id="sd">
		<ul>
		{section name=id2 loop=$album_details}
			{if $album_details[id][2][id2] neq ""}
 				<li>{$album_details[id][2][id2]}</li>
  			{/if}
		{/section}
		</ul>
</div>
{else if}
<div id="sd2"></div>
	{/if}


{if $album_details[id][1][0] neq ""}
<div id="sd">
		<ul>
		{section name=id2 loop=$album_details}
			{if $album_details[id][1][id2] neq ""}
 				<li>{$album_details[id][1][id2]}</li>
  			{/if}
		{/section}
		</ul>
</div>
{else if}
<div id="sd2"></div>
	{/if}

{if $album_details[id][0][0] neq ""}
<div id="sd" style="background-color: #FFFFFF;">
		<ul>
		{section name=id2 loop=$album_details}
			{if $album_details[id][0][id2] neq ""}
 				<li>{$album_details[id][0][id2]}</li>
  			{/if}
		{/section}
		</ul>
</div>
{else if}
<div id="sd2"></div>
	{/if}



{if $album_details[id][3][0] neq ""}
<div id="sd">
		<ul>
		{section name=id2 loop=$album_details}
			{if $album_details[id][3][id2] neq ""}
 				<li>{$album_details[id][3][id2]}</li>
  			{/if}
		{/section}
		</ul>
</div>
{else if}
<div id="sd2"></div>
	{/if}



{/section}
{/if}

{if $add eq "recenzje"}
{section name=id loop=$review_dates_list}
<div id="box" style="width: 486px;">
autor: {$review_autors_list[id]}
<p>
<ul>
<li><strong>{$review_titles_list[id]}</strong></li>
<li>{$review_texts_list[id]}</li>
<li class="sig">{$review_dates_list[id]}</li>
</ul>
</p>

</div>
{/section}

{if $hhbdurlname neq ""}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-review.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="{$id}">
<input type="hidden" name="urlname" value="{$urlname}">
<strong>TYTUŁ: </strong><input type="text" name="title" class="commentinput" style="width: 420px">
<textarea name="review" lines="12" class="commentta" style="height: 150px"></textarea>
<div style="float: left;">
<input type="hidden" name="addedby" value="{$hhbduserid}">
<input type="hidden" name="addedbyurlname" value="{$hhbdurlname}">
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">
Dodaj swoją recenzję albumu. Nasi moderatorzy sprawdzą ją jak najszybciej będzie to możliwe. Do tego czasu będzie widoczna w Twoim profilu, a po moderacji od razu pojawi się na stronie.
</div>
</div>
</div>
{/if}
{/if}


{if $add eq "oceny"}
<ul class="listanumerowana">
{foreach from=$album_ratings_list item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>
{/if}


{include file="site/part-news.tpl"}
{include file="site/part-comments.tpl"}
</div>
</div>