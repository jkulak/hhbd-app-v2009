<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">
<div id="lsh">
INFO
</div>
<div id="lsi">
<p>
Jeśli uważasz, że Twój znajomy będzie zainteresowany tą stroną, wyślij mu maila z bezpośrednim linkiem do niej.
</p>
<p>
Zespół hhbd.pl wykorzysta podany adres e-mail, tylko i wyłącznie do wysłania maila.
</p>
<p>
Po wypełnieniu obu pól, wciśnij 'WYŚLIJ', aby go wysłać.
</p>
</div>
</div>

<div id="rightcolumn">
POLECANA STRONA:
<p><strong>{$link}</strong></p>
<form method="post" action="/recommendsite">
<p>
<ul>
<li><input type="text" name="email"> docelowy adres e-mail</li>
<li><input type="text" name="signature"> Twój podpis</li>
<input type="hidden" name="sid" value="{$sid}">
<input type="hidden" name="add" value="{$add}">
</ul>
</p>
<p>
<input type="submit" value="WYŚLIJ" class="commentit">
</p>
</form>
</div>


</div>