<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">

<form method="post" action="/newaccount">
<div id="lsh">
login *
</div>
<div id="lsi">
<INPUT type="text" name="login" class="register" value="{$login}">
Wpis swój login, może składać się z liter, cyfr i podkreślenia.
</div>

<div id="lsh">
hasło *
</div>
<div id="lsi">
<INPUT type="password" name="pass1" class="register">
Wpisz hasło dla siebie. Hasła w bazie są szyfrowane. Może składać się z liter, cyfr i podkreślenia.
</div>

<div id="lsh">
POWTÓRZ HASŁO *
</div>
<div id="lsi">
<INPUT type="password" name="pass2" class="register">

</div>

<div id="lsh">
e-mail *
</div>
<div id="lsi">
<INPUT type="text" name="email" class="register" value="{$email}">
Wpisz swój adres e-mail. Rejestracja wymaga potwierdzenia poprzez kliknięcie w link podany w wysłanym przez nas mailu.
</div>

<div id="lsh">
miasto
</div>
<div id="lsi">
<INPUT type="text" name="miasto" class="register" value="{$miasto}">
Wpisz miasto w którym mieszkasz.
</div>

<div id="lsh">
WOJEWÓDZTWO
</div>
<div id="lsi">
<select name="wojewodztwo" class="register">
<option value="0">*</option>
<option value="1" {if $wojewodztwo eq 1}selected{/if}>dolnośląskie</option>
<option value="2" {if $wojewodztwo eq 2}selected{/if}>kujawsko-pomorskie</option>
<option value="3" {if $wojewodztwo eq 3}selected{/if}>lubelskie</option>
<option value="4" {if $wojewodztwo eq 4}selected{/if}>lubuskie</option>
<option value="5" {if $wojewodztwo eq 5}selected{/if}>łódzkie</option>
<option value="6" {if $wojewodztwo eq 6}selected{/if}>małopolskie</option>
<option value="7" {if $wojewodztwo eq 7}selected{/if}>mazowieckie</option>
<option value="8" {if $wojewodztwo eq 8}selected{/if}>opolskie</option>
<option value="9" {if $wojewodztwo eq 9}selected{/if}>podkarpackie</option>
<option value="10" {if $wojewodztwo eq 10}selected{/if}>podlaskie</option>
<option value="11" {if $wojewodztwo eq 11}selected{/if}>pomorskie</option>
<option value="12" {if $wojewodztwo eq 12}selected{/if}>śląskie</option>
<option value="13" {if $wojewodztwo eq 13}selected{/if}>świętokrzyskie</option>
<option value="14" {if $wojewodztwo eq 14}selected{/if}>warmińsko-mazurskie</option>
<option value="15" {if $wojewodztwo eq 15}selected{/if}>wielkopolskie</option>
<option value="16" {if $wojewodztwo eq 16}selected{/if}>zachodniopomorskie</option>
<option value="17" {if $wojewodztwo eq 17}selected{/if}>inne/zagranica</option>
</select>
</div>

<div id="lsh">
rok urodzenia
</div>
<div id="lsi">
<select name="dataurodzenia" class="register">
<option value="0" selected>*</option>
{section name=bar loop=100 max=60 step=-1}
<option value="{$smarty.section.bar.index}"  {if $dataurodzenia eq $smarty.section.bar.index}selected{/if}>19{$smarty.section.bar.index}</option>
{/section}							
</select>



</div>


<div id="lsh">
płeć
</div>
<div id="lsi">
<select name="plec" class="register">
<option value="0">*</option>
<option value="1" {if $plec eq 1}selected{/if}>kobieta</option>
<option value="2" {if $plec eq 2}selected{/if}>męczyzna</option>
</select>
</div>

<input type="submit" value="ZA�ӯ KONTO" class="nab">



</form>
</div>



<div id="rightcolumn">
Założenie konta jest jednoznaczne z potwierdzeniem zapoznania się z <a href="/zasadyuzytkowania">zasadami użytkowania</a> hhbd.pl. Aby założyć konto, proszę wypełnić prosty formularz po lewej. Założenie i używanie konta jest darmowe, a daje dodatkowo następujące możliwości:
<ul class="listanumerowana">
<li class="ind">Recenzowanie albumów.</li>
<li class="ind">Tworzenie swojej wirtualnej kolekcji albumów z hhbd.pl.</li>
<li class="ind">Tworzenie swojej wirtualnej "chcęlisty" albumów z hhbd.pl.</li>
<li class="ind">Ocenianie albumów z hhbd.pl.</li>
<li class="ind">Dodawanie tytułów utworów, z których sample zostały wykorzystane w polskich numerach.</li>
<li class="ind">Dodawanie nieoficjalnych stron wykonawców.</li>
<li class="ind">Rozszerzenie informacji na temat wykonawców o zdobyte nagrody, zajęte miejsca na listach przebojów, daty urodzenia/powstania, prawdziwe imiona, nazwiska.</li>
<li class="ind">Możliwość zgłaszania błędów w danych.</li>
<li class="ind">Możliwość brania udziału w konkursach.</li>
<li class="ind">Wkrótce wiele innych.</li>
</ul>
Jako zespół hhbd.pl obiecujemy nigdy nie dać i nie sprzedać nikomu podanego adresu e-mail, zostanie on wykorzystany jedynie do potwierdzenia założenia konta i późniejszego ewentualnego kontaktu.
</div>

</div>