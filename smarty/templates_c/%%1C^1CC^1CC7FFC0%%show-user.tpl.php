<?php /* Smarty version 2.6.9, created on 2008-11-23 14:52:21
         compiled from user/show-user.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1>użytkownik: <?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">


<div id="namenavbar">

<?php if ($this->_tpl_vars['show_reviews_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/recenzje">RECENZJE</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_wishlist_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/chcelista">CHCĘLISTA</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_collection_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/kolekcja">KOLEKCJA</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_ratings_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/oceny">OCENY</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_samples_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/sample">SAMPLE</a>
</div>
<?php endif; ?>

<div id="nametab" class="nametab">
<a href="/u/<?php echo $this->_tpl_vars['urlname']; ?>
/wyslijwiadomosc">WYŚLIJ WIADOMOŚĆ</a>
</div>

</div>




<div id="leftcolumn">

<div id="lsh">Konto utworzone</div>
<div id="lsi"><?php echo $this->_tpl_vars['added']; ?>
</div>

<?php if ($this->_tpl_vars['age'] != ""): ?>
<div id="lsh">wiek</div>
<div id="lsi"><?php echo $this->_tpl_vars['age']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['place'] != ""): ?>
<div id="lsh">miasto</div>
<div id="lsi"><?php echo $this->_tpl_vars['place']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['about'] != ""): ?>
<div id="lsh">PROFIL</div>
<div id="lsi"><?php echo $this->_tpl_vars['about']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['reviews_count'] != ""): ?>
<div id="lsh">DODANYCH RECENZJI</div>
<div id="lsi"><?php echo $this->_tpl_vars['reviews_count']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['collection_count'] != ""): ?>
<div id="lsh">albumów w kolekcji</div>
<div id="lsi"><?php echo $this->_tpl_vars['collection_count']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['wishlist_count'] != ""): ?>
<div id="lsh">albumów w chcęliście</div>
<div id="lsi"><?php echo $this->_tpl_vars['wishlist_count']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['samples_count'] != ""): ?>
<div id="lsh">INFO O SAMPLACH</div>
<div id="lsi"><?php echo $this->_tpl_vars['samples_count']; ?>
</div>
<?php endif; ?>





</div>



<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;"><?php echo $this->_tpl_vars['sectiontitle']; ?>
</h1>
</div>
</div>

<?php if ($this->_tpl_vars['add'] == 'chcelista'): ?>
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
<?php endif; ?>


<?php if ($this->_tpl_vars['add'] == 'kolekcja'): ?>
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
<?php endif; ?>


<?php if ($this->_tpl_vars['add'] == 'recenzje'):  unset($this->_sections['id']);
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
<div id="box" style="width: 486px;">
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
<?php endfor; endif;  endif; ?>




<?php if ($this->_tpl_vars['add'] == 'sample'):  unset($this->_sections['id']);
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
<div id="box" style="width: 486px;">

<ul>
<li>album: <?php echo $this->_tpl_vars['sample_albums_list'][$this->_sections['id']['index']]; ?>
</li>
<li>piosenka: <?php echo $this->_tpl_vars['sample_songs_list'][$this->_sections['id']['index']]; ?>
</li>
<li>sampel z: <strong><?php echo $this->_tpl_vars['sample_infos_list'][$this->_sections['id']['index']]; ?>
</strong></li>
<li class="sig"><?php echo $this->_tpl_vars['sample_dates_list'][$this->_sections['id']['index']]; ?>
</li>
</ul>
</div>
<?php endfor; endif;  endif; ?>

<?php if ($this->_tpl_vars['add'] == 'oceny'): ?>
<strong>WYKONAWCA - TYTUŁ ALBUMU: OCENA</strong>
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



</div>

</div>
