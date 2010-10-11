<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">
<div id="lsh">
DODAWANIE SAMPLI
</div>
<div id="lsi">
<p>
Wype³nij pola obok informacjami o samplu, który rozpona³e¶ w wybranym utworze.
</p>
<p>
Nasi moderatorzy zweryfikuj± t± informacjê, po czym udostêpni± j± ca³ej publiczno¶ci.
</p>
<p>
Informacja nie musi byæ pe³na, nasi moderatorzy postaraj± siê dotrzeæ do pe³nej informacji na w³asn± rekê.
</p>
</div>
</div>

<div id="rightcolumn">

<p>UTWÓR: <strong>{$stitle}</strong></p>
<form method="post" action="/addsample">
<p>
<ul>
<li><input type="text" name="title"> tytu³ utworu, z którego pochodzi sampel</li>
<li><input type="text" name="artist"> nazwa wykonawcy</li>
<li><input type="text" name="album"> tytu³ albumu</li>
<li><input type="text" name="label"> wytwórnia</li>
<li><input type="text" name="year"> rok wydania</li>
<input type="hidden" name="sid" value="{$sid}">
</ul>
</p>
<p>
<input type="submit" value="DODAJ" class="commentit">
</p>
</form>
</div>


</div>