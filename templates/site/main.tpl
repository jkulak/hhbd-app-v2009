<div id="latest">
  <h1>Ostatnio wydane albumy</h1>
  <ul class="elemlist">
  {section name=id loop=$ownalbum_ids_list}
    <li class="elem">
      <a class="cover" href="/a/{$ownalbum_ids_list[id]}">
        <img src="/imgs/database/albums-thumbs/{$ownalbum_covers_list[id]}" alt="Okładka {$ownalbums_names[id]} - {$ownalbums_titles[id]}" title="{$ownalbums_names[id]} - {$ownalbums_titles[id]}"/>
        <span></span>
      </a>
      <ul class="info">
        <li>{$ownalbum_artists_list[id]} - {$ownalbum_titles_list[id]}</li>
        <li>Wytwórnia: {$ownalbum_labels_list[id]}</li>
        <li>Data wydania: {$ownalbum_years_list[id]}</li>
      </ul>
    </li>
  {/section}
  </ul>
  <a href="/albumy">Pokaż wszystkie albumy</a>
</div>

<div id="premieres">
  <h1>Zapowiedziane premiery</h1>
  <ul class="elemlist">
  {section name=id loop=$album_ids_list}
    <li class="elem">
      <a class="cover" href="/a/{$album_ids_list[id]}">
        <img src="/imgs/database/albums-thumbs/{$album_covers_list[id]}" alt="Okładka {$albums_names[id]} - {$albums_titles[id]}" title="{$albums_names[id]} - {$albums_titles[id]}"/>
        <span></span>
      </a>
      <ul class="info">
        <li>{$album_artists_list[id]} - {$album_titles_list[id]}</li>
        <li>Wytwórnia: {$album_labels_list[id]}</li>
        <li>Data wydania: {$album_years_list[id]}</li>
      </ul>
    </li>
  {/section}
  </ul>
  <a href="/zapowiedzi">Pokaż wszystkie zapowiedzi</a>
</div>

<div id="intro">
<h1>Polski hip-hop w pigułce</h1>
Witamy na stronie o polskim hip-hopie! Piąty element, wiedza. U nas znajdziesz wszystko czego szukasz o polskim hip-hopie. Recenzje, traklisty albumów, informacje o premierach, profile wykonawców, listy wydanych płyt przez poszczególne wytwórnie, aktualne newsy, teksty piosenek i wiele innych. Zarejestruj się, będziesz miał dostęp do wielu dodatkowych opcji oraz możliwość brania udziału w konkursach!
</div>