<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">

<div id="namenavbar">

<div id="nametab" class="nametab">
<a href="/mojprofil">PROFIL</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/recenzje">RECENZJE</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/oceny">OCENY</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/chcelista">CHCĘLISTA</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/kolekcja">KOLEKCJA</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/sample">SAMPLE</a>
</div>

<div id="nametab" class="nametab">
<a href="/mojprofil/ustawienia">USTAWIENIA</a>
</div>

</div>

{if $id eq "profil"}
<ul>
<li>Logowałeś się: <strong>{$timesloggedin}</strong> razy</li>
<li>Ostatnie logowanie: <strong>{$lastlogin}</strong></li>
<li>Twój profil był oglądany: <strong>{$viewed}</strong> razy</li>
<li>Konto założone: <strong>{$added}</strong></li>
</ul>
{/if}

{if $id eq "recenzje"}
{section name=id loop=$review_dates_list}
<div id="box">
<div style="width: 500px;" id="l">
{$review_artists_list[id]} - {$review_albums_list[id]}
<p>
<ul>
<li><strong>{$review_titles_list[id]}</strong></li>
<li>{$review_texts_list[id]}</li>
<li class="sig">{$review_dates_list[id]}</li>
</ul>
</p>
</div>

<div id="r">{$review_status_list[id]}</div>

</div>
{/section}
{/if}

{if $id eq "chcelista"}
<strong>WYKONAWCA - TYTUŁ ALBUMU (ILOŚĆ UŻYTKOWNIKÓW POSIADAJĄCYCH ALBUM W CHCĘLIŚCIE)</strong>
<p>
<ul class="listanumerowana">
{section name=id loop=$wishlist}
<li class="itemnumerowany">{$wishlist[id]}</li>
{/section}
</ul>
</p>
{/if}

{if $id eq "kolekcja"}
<strong>WYKONAWCA - TYTUŁ ALBUMU (ILOŚĆ UŻYTKOWNIKÓW POSIADAJĄCYCH ALBUM W KOLEKCJI)</strong>
<p>
<ul class="listanumerowana">
{section name=id loop=$collection}
<li class="itemnumerowany">{$collection[id]}</li>
{/section}
</ul>
</p>
{/if}

{if $id eq "oceny"}
<strong>WYKONAWCA - TYTUŁ ALBUMU: TWOJA OCENA/OCENA ALBUMU (ILOŚĆ OCEN) </strong>
<p>
<ul class="listanumerowana">
{section name=id loop=$ratings}
<li class="itemnumerowany">{$ratings[id]}</li>
{/section}
</ul>
</p>
{/if}

{if $id eq "sample"}
{section name=id loop=$sample_dates_list}
<div id="box">
<div id="l" style="width: 650px;">
{$sample_songs_list[id]}
<ul>
<li>sampel z: <strong>{$sample_infos_list[id]}</strong></li>
<li class="sig">{$sample_dates_list[id]}</li>
</ul>
</div>

<div id="r">{$sample_status_list[id]}</div>

</div>
{/section}
{/if}

{if $id eq "ustawienia"}
<form method="post" action="/updateusersettings">

<div id="box">
<strong>OPCJE</strong>
<p>
<ul>
<li><input type="checkbox" name="allow_wishlist" value="y"  {$allow_wishlist}>
Zezwól na przeglądanie mojej chcęlisty.</li>
<li><input type="checkbox" name="allow_collection" value="y"  {$allow_collection}>
Zezwól na przeglądanie mojej kolekcji.</li>
</ul>
</p>
</div>

<div id="box">
<strong>E-MAIL: {$email}</strong> (wpisz nowy e-mail w oba pola, jeżeli chcesz go zmienić)
{if $emailerr neq ""}<div id="msg">{$emailerr|upper}</div>{/if}
<p>
<ul>
<li><input type="text" name="email1"> nowy e-mail</li>
<li><input type="text" name="email2"> nowy e-mail jeszcze raz</li>
</ul>
</p>
</div>

<div id="box">
<strong>HASŁO</strong> (wpisz nowe hasło jeżeli chcesz je zmienić)
{if $passerr neq ""}<div id="msg">{$passerr|upper}</div>{/if}
<p>
<ul>
<li><input type="password" name="old_pass"> aktualne hasło</li>
<li><input type="password" name="pass1"> nowe hasło</li>
<li><input type="password" name="pass2"> nowe hasło jeszcze raz</li>
</ul>
</p>
</div>


<input type="submit" value="ZAPISZ ZMIANY" style="font-weight: bold;">
</form>
{/if}



</div>