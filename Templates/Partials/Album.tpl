<li class="elem">
  <a class="cover" href="{$album->url()}">
    <img src="{$album->cover}" alt="Okładka {$album->artist->name} - {$album->title}" title="{$album->artist->name} - {$albums_titles[id]}"/>
    <span></span>
  </a>
  <ul class="info">
    <li><a href="{$album->url()}">{$album->artist->name} - {$album->title}</a></li>
    {if isset($album->label)}<li><a href="{$album->label->url()}">{$album->label->name}</a></li>{/if}
    <li>Wydana: {$album->releaseDate}</li>
  </ul>
</li>