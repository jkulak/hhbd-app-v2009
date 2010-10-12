<h1>{$subtitle}</h1>

{include file='Partials/AlbumPaging.tpl'}

<ul class="elemlist">
{foreach from=$albums->items item=album}
  <li>{include file='Partials/Album.tpl' album=$album}</li>
{/foreach}
</ul>

{include file='Partials/AlbumPaging.tpl'}

<!-- paginacja alfabet -->