<?php /* Smarty version 2.6.9, created on 2009-01-03 19:27:55
         compiled from user/myprofile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'user/myprofile.tpl', 137, false),)), $this); ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
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

<?php if ($this->_tpl_vars['id'] == 'profil'): ?>
<ul>
<li>Logowałeś się: <strong><?php echo $this->_tpl_vars['timesloggedin']; ?>
</strong> razy</li>
<li>Ostatnie logowanie: <strong><?php echo $this->_tpl_vars['lastlogin']; ?>
</strong></li>
<li>Twój profil był oglądany: <strong><?php echo $this->_tpl_vars['viewed']; ?>
</strong> razy</li>
<li>Konto założone: <strong><?php echo $this->_tpl_vars['added']; ?>
</strong></li>
</ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['id'] == 'recenzje'):  unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['review_dates_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<div id="box">
<div style="width: 500px;" id="l">
<?php echo $this->_tpl_vars['review_artists_list'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['review_albums_list'][$this->_sections['id']['index']]; ?>

<p>
<ul>
<li><strong><?php echo $this->_tpl_vars['review_titles_list'][$this->_sections['id']['index']]; ?>
</strong></li>
<li><?php echo $this->_tpl_vars['review_texts_list'][$this->_sections['id']['index']]; ?>
</li>
<li class="sig"><?php echo $this->_tpl_vars['review_dates_list'][$this->_sections['id']['index']]; ?>
</li>
</ul>
</p>
</div>

<div id="r"><?php echo $this->_tpl_vars['review_status_list'][$this->_sections['id']['index']]; ?>
</div>

</div>
<?php endfor; endif;  endif; ?>

<?php if ($this->_tpl_vars['id'] == 'chcelista'): ?>
<strong>WYKONAWCA - TYTUŁ ALBUMU (ILOŚĆ UŻYTKOWNIKÓW POSIADAJĄCYCH ALBUM W CHCĘLIŚCIE)</strong>
<p>
<ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['wishlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['wishlist'][$this->_sections['id']['index']]; ?>
</li>
<?php endfor; endif; ?>
</ul>
</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['id'] == 'kolekcja'): ?>
<strong>WYKONAWCA - TYTUŁ ALBUMU (ILOŚĆ UŻYTKOWNIKÓW POSIADAJĄCYCH ALBUM W KOLEKCJI)</strong>
<p>
<ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['collection']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['collection'][$this->_sections['id']['index']]; ?>
</li>
<?php endfor; endif; ?>
</ul>
</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['id'] == 'oceny'): ?>
<strong>WYKONAWCA - TYTUŁ ALBUMU: TWOJA OCENA/OCENA ALBUMU (ILOŚĆ OCEN) </strong>
<p>
<ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['ratings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['ratings'][$this->_sections['id']['index']]; ?>
</li>
<?php endfor; endif; ?>
</ul>
</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['id'] == 'sample'):  unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['sample_dates_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
<div id="box">
<div id="l" style="width: 650px;">
<?php echo $this->_tpl_vars['sample_songs_list'][$this->_sections['id']['index']]; ?>

<ul>
<li>sampel z: <strong><?php echo $this->_tpl_vars['sample_infos_list'][$this->_sections['id']['index']]; ?>
</strong></li>
<li class="sig"><?php echo $this->_tpl_vars['sample_dates_list'][$this->_sections['id']['index']]; ?>
</li>
</ul>
</div>

<div id="r"><?php echo $this->_tpl_vars['sample_status_list'][$this->_sections['id']['index']]; ?>
</div>

</div>
<?php endfor; endif;  endif; ?>

<?php if ($this->_tpl_vars['id'] == 'ustawienia'): ?>
<form method="post" action="/updateusersettings">

<div id="box">
<strong>OPCJE</strong>
<p>
<ul>
<li><input type="checkbox" name="allow_wishlist" value="y"  <?php echo $this->_tpl_vars['allow_wishlist']; ?>
>
Zezwól na przeglądanie mojej chcęlisty.</li>
<li><input type="checkbox" name="allow_collection" value="y"  <?php echo $this->_tpl_vars['allow_collection']; ?>
>
Zezwól na przeglądanie mojej kolekcji.</li>
</ul>
</p>
</div>

<div id="box">
<strong>E-MAIL: <?php echo $this->_tpl_vars['email']; ?>
</strong> (wpisz nowy e-mail w oba pola, jeżeli chcesz go zmienić)
<?php if ($this->_tpl_vars['emailerr'] != ""): ?><div id="msg"><?php echo ((is_array($_tmp=$this->_tpl_vars['emailerr'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div><?php endif; ?>
<p>
<ul>
<li><input type="text" name="email1"> nowy e-mail</li>
<li><input type="text" name="email2"> nowy e-mail jeszcze raz</li>
</ul>
</p>
</div>

<div id="box">
<strong>HASŁO</strong> (wpisz nowe hasło jeżeli chcesz je zmienić)
<?php if ($this->_tpl_vars['passerr'] != ""): ?><div id="msg"><?php echo ((is_array($_tmp=$this->_tpl_vars['passerr'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</div><?php endif; ?>
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
<?php endif; ?>



</div>