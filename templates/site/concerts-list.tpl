<div id="sitetitle">
<div id="titleleft">
<h1>LISTA IMPREZ</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
miesiace? nie wiem co tutaj jeszcze. miasta? daty? cokolwiek?
</div>


{section name=id loop=$concerts}
<div id="name_news_body" class="name_news_read">
<div id="name_album_thumb">
<a href="/p/{$concertsurlnames[id]}">
<img src="/imgs/database/posters-thumbs/{$concertsthumbs[id]}" border="0" >
</a>
</div>
{$concerts[id]}
 </div>
{/section}

