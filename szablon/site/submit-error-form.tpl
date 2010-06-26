<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">
<div id="lsh">
UWAGA
</div>
<div id="lsi">
<p>
Mimo, że dokładamy największych starań, aby publikowane przez nas informacje były wiarygodne i zgodne z prawdą, może zdarzyć się, że gdzieś wystąpił błąd.
</p>
<p>
Proszę w okienku obok opisać błąd, podać swoją, ewentualną, prawidłową wersję i kliknąć 'wyślij'.
</p>
<p>
Błąd, po uprzedniej weryfikacji, zostanie poprawiony najszybciej jak to będzie możliwe.
</p>
</div>
</div>

<div id="rightcolumn">
<form method="post" action="/submiterror">
<textarea name="message" lines="10" class="commentta"></textarea>
<input type="hidden" name="addedby" value="{$hhbdurlname}">
<input type="hidden" name="sid" value="{$sid}">
<input type="hidden" name="add" value="{$add}">
<input type="submit" value="WYŚLIJ" class="commentit">
</form>
</div>


</div>