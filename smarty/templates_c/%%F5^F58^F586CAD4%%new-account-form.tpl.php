<?php /* Smarty version 2.6.9, created on 2008-11-24 11:07:24
         compiled from user/new-account-form.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">

<form method="post" action="/newaccount">
<div id="lsh">
login *
</div>
<div id="lsi">
<INPUT type="text" name="login" class="register" value="<?php echo $this->_tpl_vars['login']; ?>
">
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
<INPUT type="text" name="email" class="register" value="<?php echo $this->_tpl_vars['email']; ?>
">
Wpisz swój adres e-mail. Rejestracja wymaga potwierdzenia poprzez kliknięcie w link podany w wysłanym przez nas mailu.
</div>

<div id="lsh">
miasto
</div>
<div id="lsi">
<INPUT type="text" name="miasto" class="register" value="<?php echo $this->_tpl_vars['miasto']; ?>
">
Wpisz miasto w którym mieszkasz.
</div>

<div id="lsh">
WOJEWÓDZTWO
</div>
<div id="lsi">
<select name="wojewodztwo" class="register">
<option value="0">*</option>
<option value="1" <?php if ($this->_tpl_vars['wojewodztwo'] == 1): ?>selected<?php endif; ?>>dolnośląskie</option>
<option value="2" <?php if ($this->_tpl_vars['wojewodztwo'] == 2): ?>selected<?php endif; ?>>kujawsko-pomorskie</option>
<option value="3" <?php if ($this->_tpl_vars['wojewodztwo'] == 3): ?>selected<?php endif; ?>>lubelskie</option>
<option value="4" <?php if ($this->_tpl_vars['wojewodztwo'] == 4): ?>selected<?php endif; ?>>lubuskie</option>
<option value="5" <?php if ($this->_tpl_vars['wojewodztwo'] == 5): ?>selected<?php endif; ?>>łódzkie</option>
<option value="6" <?php if ($this->_tpl_vars['wojewodztwo'] == 6): ?>selected<?php endif; ?>>małopolskie</option>
<option value="7" <?php if ($this->_tpl_vars['wojewodztwo'] == 7): ?>selected<?php endif; ?>>mazowieckie</option>
<option value="8" <?php if ($this->_tpl_vars['wojewodztwo'] == 8): ?>selected<?php endif; ?>>opolskie</option>
<option value="9" <?php if ($this->_tpl_vars['wojewodztwo'] == 9): ?>selected<?php endif; ?>>podkarpackie</option>
<option value="10" <?php if ($this->_tpl_vars['wojewodztwo'] == 10): ?>selected<?php endif; ?>>podlaskie</option>
<option value="11" <?php if ($this->_tpl_vars['wojewodztwo'] == 11): ?>selected<?php endif; ?>>pomorskie</option>
<option value="12" <?php if ($this->_tpl_vars['wojewodztwo'] == 12): ?>selected<?php endif; ?>>śląskie</option>
<option value="13" <?php if ($this->_tpl_vars['wojewodztwo'] == 13): ?>selected<?php endif; ?>>świętokrzyskie</option>
<option value="14" <?php if ($this->_tpl_vars['wojewodztwo'] == 14): ?>selected<?php endif; ?>>warmińsko-mazurskie</option>
<option value="15" <?php if ($this->_tpl_vars['wojewodztwo'] == 15): ?>selected<?php endif; ?>>wielkopolskie</option>
<option value="16" <?php if ($this->_tpl_vars['wojewodztwo'] == 16): ?>selected<?php endif; ?>>zachodniopomorskie</option>
<option value="17" <?php if ($this->_tpl_vars['wojewodztwo'] == 17): ?>selected<?php endif; ?>>inne/zagranica</option>
</select>
</div>

<div id="lsh">
rok urodzenia
</div>
<div id="lsi">
<select name="dataurodzenia" class="register">
<option value="0" selected>*</option>
<?php unset($this->_sections['bar']);
$this->_sections['bar']['name'] = 'bar';
$this->_sections['bar']['loop'] = is_array($_loop=100) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bar']['max'] = (int)60;
$this->_sections['bar']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['bar']['show'] = true;
if ($this->_sections['bar']['max'] < 0)
    $this->_sections['bar']['max'] = $this->_sections['bar']['loop'];
$this->_sections['bar']['start'] = $this->_sections['bar']['step'] > 0 ? 0 : $this->_sections['bar']['loop']-1;
if ($this->_sections['bar']['show']) {
    $this->_sections['bar']['total'] = min(ceil(($this->_sections['bar']['step'] > 0 ? $this->_sections['bar']['loop'] - $this->_sections['bar']['start'] : $this->_sections['bar']['start']+1)/abs($this->_sections['bar']['step'])), $this->_sections['bar']['max']);
    if ($this->_sections['bar']['total'] == 0)
        $this->_sections['bar']['show'] = false;
} else
    $this->_sections['bar']['total'] = 0;
if ($this->_sections['bar']['show']):

            for ($this->_sections['bar']['index'] = $this->_sections['bar']['start'], $this->_sections['bar']['iteration'] = 1;
                 $this->_sections['bar']['iteration'] <= $this->_sections['bar']['total'];
                 $this->_sections['bar']['index'] += $this->_sections['bar']['step'], $this->_sections['bar']['iteration']++):
$this->_sections['bar']['rownum'] = $this->_sections['bar']['iteration'];
$this->_sections['bar']['index_prev'] = $this->_sections['bar']['index'] - $this->_sections['bar']['step'];
$this->_sections['bar']['index_next'] = $this->_sections['bar']['index'] + $this->_sections['bar']['step'];
$this->_sections['bar']['first']      = ($this->_sections['bar']['iteration'] == 1);
$this->_sections['bar']['last']       = ($this->_sections['bar']['iteration'] == $this->_sections['bar']['total']);
?>
<option value="<?php echo $this->_sections['bar']['index']; ?>
"  <?php if ($this->_tpl_vars['dataurodzenia'] == $this->_sections['bar']['index']): ?>selected<?php endif; ?>>19<?php echo $this->_sections['bar']['index']; ?>
</option>
<?php endfor; endif; ?>							
</select>



</div>


<div id="lsh">
płeć
</div>
<div id="lsi">
<select name="plec" class="register">
<option value="0">*</option>
<option value="1" <?php if ($this->_tpl_vars['plec'] == 1): ?>selected<?php endif; ?>>kobieta</option>
<option value="2" <?php if ($this->_tpl_vars['plec'] == 2): ?>selected<?php endif; ?>>męczyzna</option>
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