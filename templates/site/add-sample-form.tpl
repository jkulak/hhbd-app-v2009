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
Wype�nij pola obok informacjami o samplu, kt�ry rozpona�e� w wybranym utworze.
</p>
<p>
Nasi moderatorzy zweryfikuj� t� informacj�, po czym udost�pni� j� ca�ej publiczno�ci.
</p>
<p>
Informacja nie musi by� pe�na, nasi moderatorzy postaraj� si� dotrze� do pe�nej informacji na w�asn� rek�.
</p>
</div>
</div>

<div id="rightcolumn">

<p>UTW�R: <strong>{$stitle}</strong></p>
<form method="post" action="/addsample">
<p>
<ul>
<li><input type="text" name="title"> tytu� utworu, z kt�rego pochodzi sampel</li>
<li><input type="text" name="artist"> nazwa wykonawcy</li>
<li><input type="text" name="album"> tytu� albumu</li>
<li><input type="text" name="label"> wytw�rnia</li>
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