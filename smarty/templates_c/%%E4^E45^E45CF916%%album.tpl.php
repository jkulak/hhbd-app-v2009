<?php /* Smarty version 2.6.9, created on 2008-11-23 14:53:47
         compiled from site/album.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'site/album.tpl', 165, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="maincontainer">
<div id="namenavbar">
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
">INFO</a>
</div>
<?php if ($this->_tpl_vars['show_description_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/opis">OPIS</a>
</div>
<?php endif;  if ($this->_tpl_vars['show_tracklist_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/lista">SZCZEGӣOWA LISTA</a>
</div>
<?php endif;  if ($this->_tpl_vars['hhbdurlname'] != "" || $this->_tpl_vars['show_reviews_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/recenzje">RECENZJE</a>
</div>
<?php endif;  if ($this->_tpl_vars['show_ratings_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/oceny">OCENY</a>
</div>
<?php endif;  if ($this->_tpl_vars['show_news_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/newsy">NEWSY</a>
</div>
<?php endif; ?>
<div id="nametab" class="nametab">
<a href="/a/<?php echo $this->_tpl_vars['urlname']; ?>
/komentarze">KOMENTARZE</a>
</div>
</div>
<div id="leftcolumn">
<div id="main_picture">
<img src="/imgs/database/albums/<?php echo $this->_tpl_vars['cover']; ?>
" border="0" alt="<?php echo $this->_tpl_vars['imagealt']; ?>
">
</div>
<?php if ($this->_tpl_vars['artist'] != ""): ?>
<div id="lsh">WYKONAWCA</div>
<div id="lsi"><?php echo $this->_tpl_vars['artist']; ?>
</div>
<?php endif;  if ($this->_tpl_vars['year'] != ""): ?>
<div id="lsh">PREMIERA</div>
<div id="lsi"><?php echo $this->_tpl_vars['year']; ?>
</div>
<?php endif;  if ($this->_tpl_vars['premier'] != ""): ?>
<div id="lsh" style="color: red;">PLANOWANA PREMIERA</div>
<div id="lsi" ><?php echo $this->_tpl_vars['premier']; ?>
</div>
<?php endif;  if ($this->_tpl_vars['label'] != ""): ?>
<div id="lsh">WYTWÓRNIA</div>
<div id="lsi"><?php echo $this->_tpl_vars['label']; ?>
</div>
<?php endif;  if ($this->_tpl_vars['catalog_cd'] != ""): ?>
<div id="lsh">NUMER KATALOGOWY</div>
<div id="lsi"><?php echo $this->_tpl_vars['catalog_cd']; ?>
</div>
<?php endif;  if ($this->_tpl_vars['top10'] != ""): ?>
<div id="lsh">HHBD.PL TOP10</div>
<div id="lsi">
#<?php echo $this->_tpl_vars['top10']; ?>

</div>
<?php endif;  if ($this->_tpl_vars['album_singles_list'][0] != ""): ?>
<div id="lsh">POPRZEDZONY SINGLAMI</div>
<div id="lsi">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['album_singles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif;  if ($this->_tpl_vars['epfor'] != ""): ?>
<div id="lsh">SINGIEL DO ALBUMU</div>
<div id="lsi">
<?php echo $this->_tpl_vars['epfor']; ?>

</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['promomix'] != ""): ?>
<div id="lsh">PROMOMIX</div>
<div id="lsi"><?php echo $this->_tpl_vars['promomix']; ?>
</div>
<?php endif; ?>



<?php if ($this->_tpl_vars['length'] != ""): ?>
<div id="lsh">CZAS TRWANIA</div>
<div id="lsi"><?php echo $this->_tpl_vars['length']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['album_shops_list'][0] != ""): ?>
<div id="lsh">KUP ALBUM</div>
<div id="lsi">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['album_shops_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>


<div id="lsh">OCEŃ <?php echo $this->_tpl_vars['ratingpic']; ?>
</div>
<div id="lsi">
<ul>
<li><?php echo $this->_tpl_vars['rate']; ?>
</li>
<li><?php echo $this->_tpl_vars['myrate']; ?>
</li>
</ul>
</div>

<div id="lsh">PERSONALIZACJA</div>
<div id="lsi">
<ul>
<li><?php echo $this->_tpl_vars['percoll']; ?>
</li>
<li><?php echo $this->_tpl_vars['perwish']; ?>
</li>
</ul>

</div>


<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>w <a href="/kolekcja/<?php echo $this->_tpl_vars['urlname']; ?>
">kolekcji</a>: <?php echo $this->_tpl_vars['collcount']; ?>
 użytkowników</li>
<li>w <a href="/chcelista/<?php echo $this->_tpl_vars['urlname']; ?>
">chcęliście</a>: <?php echo $this->_tpl_vars['wishcount']; ?>
 użytkowników</li>
<li>wyświetleń: <?php echo $this->_tpl_vars['viewed']; ?>
</li>
</UL>
</div>
</div>
<div id="rightcolumn">
<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;"><?php echo $this->_tpl_vars['sectiontitle']; ?>
</h1>
</div>
</div>

<?php if ($this->_tpl_vars['add'] == 'informacje'): ?>
	
	<?php if ($this->_tpl_vars['shortartistabout'] != ""): ?>
	<div id="name_news_header">
	<?php echo $this->_tpl_vars['artist']; ?>
 O SWOJEJ PŁYCIE
	</div>
	<div id="text" class="profil"><?php echo $this->_tpl_vars['shortartistabout']; ?>
</div>
	<?php endif; ?>
	
	
	<?php if ($this->_tpl_vars['show_tracklist_tab'] == 1): ?>
	<div id="name_news_header">TRAKLSITA</div>
	<div id="tracklist">
	<ul>
	
	<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['album_tracks_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<?php echo '<div id="stc" style="width: 492px; background-color: ';  echo smarty_function_cycle(array('values' => "#EEEEEE,#F8F8F8"), $this); echo '"><div id="st">';  echo $this->_tpl_vars['album_tracks_list'][$this->_sections['id']['index']];  echo '</div>';  if ($this->_tpl_vars['album_samples_list'][$this->_sections['id']['index']] != '0'):  echo '<div id="std"><img src="/imgs/layout/sample.gif"></div>';  endif;  echo '';  if ($this->_tpl_vars['album_lalalabs_list'][$this->_sections['id']['index']] != '0'):  echo '<div id="std"><a href="/lalalab/';  echo $this->_tpl_vars['album_lalalabs_list'][$this->_sections['id']['index']];  echo '" target="_blank"><img src="/imgs/layout/lalalab.gif" border="0" alt="Pobierz dzwonek z Lalalab.pl"></a></div>';  endif;  echo '';  if ($this->_tpl_vars['album_clips_list'][$this->_sections['id']['index']] != ""):  echo '<div id="std"><img src="/imgs/layout/clip.gif"></div>';  endif;  echo '</div>'; ?>

	<?php endfor; endif; ?>
	
	</ul>
	</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['shortdesc'] != ""): ?>
	<div id="name_news_header">
	OPIS ALBUMU
	</div>
	<div id="text" class="profil"><?php echo $this->_tpl_vars['shortdesc']; ?>
</div>
	<?php endif; ?>
	
	
<?php endif; ?>



<?php if ($this->_tpl_vars['add'] == 'opis'): ?>
	<?php if ($this->_tpl_vars['artistabout'] != ""): ?>
		<div id="name_news_header">
		<?php echo $this->_tpl_vars['artist']; ?>
 O SWOJEJ PŁYCIE
		</div>
		<div id="text" class="profil"><?php echo $this->_tpl_vars['artistabout']; ?>
</div>	
		<?php endif; ?>
	
	<?php if ($this->_tpl_vars['albumdescription'] != ""): ?>
		<div id="name_news_header">OPIS</div>
		<div id="text" class="profil"><?php echo $this->_tpl_vars['albumdescription']; ?>
</div>
		<?php endif; ?>
	
	<?php endif; ?>

<?php if ($this->_tpl_vars['add'] == 'lista'): ?>

<div id="sd">rap</div>
<div id="sd">muzyka</div>
<div id="sd">goscinnie</div>
<div id="sd">skrecze / cuty</div>

<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['album_tracks_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="stc">
<div id="st"><?php echo $this->_tpl_vars['album_tracks_list'][$this->_sections['id']['index']]; ?>
</div>
<?php if ($this->_tpl_vars['album_samples_list'][$this->_sections['id']['index']] != '0'): ?>
<div id="std"><img src="/imgs/layout/sample.gif"></div>
<?php endif;  if ($this->_tpl_vars['album_lalalabs_list'][$this->_sections['id']['index']] != '0'): ?>
<div id="std"><a href="/lalalab/<?php echo $this->_tpl_vars['album_lalalabs_list'][$this->_sections['id']['index']]; ?>
" target="_blank"><img src="/imgs/layout/lalalab.gif" border="0" alt="Pobierz dzwonek z Lalalab.pl"></a></div>
<?php endif;  if ($this->_tpl_vars['album_clips_list'][$this->_sections['id']['index']] != ""): ?>
<div id="std"><img src="/imgs/layout/clip.gif"></div>
<?php endif; ?>
 
</div>


<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][2][0] != ""): ?>
<div id="sd">
		<ul>
		<?php unset($this->_sections['id2']);
$this->_sections['id2']['name'] = 'id2';
$this->_sections['id2']['loop'] = is_array($_loop=$this->_tpl_vars['album_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id2']['show'] = true;
$this->_sections['id2']['max'] = $this->_sections['id2']['loop'];
$this->_sections['id2']['step'] = 1;
$this->_sections['id2']['start'] = $this->_sections['id2']['step'] > 0 ? 0 : $this->_sections['id2']['loop']-1;
if ($this->_sections['id2']['show']) {
    $this->_sections['id2']['total'] = $this->_sections['id2']['loop'];
    if ($this->_sections['id2']['total'] == 0)
        $this->_sections['id2']['show'] = false;
} else
    $this->_sections['id2']['total'] = 0;
if ($this->_sections['id2']['show']):

            for ($this->_sections['id2']['index'] = $this->_sections['id2']['start'], $this->_sections['id2']['iteration'] = 1;
                 $this->_sections['id2']['iteration'] <= $this->_sections['id2']['total'];
                 $this->_sections['id2']['index'] += $this->_sections['id2']['step'], $this->_sections['id2']['iteration']++):
$this->_sections['id2']['rownum'] = $this->_sections['id2']['iteration'];
$this->_sections['id2']['index_prev'] = $this->_sections['id2']['index'] - $this->_sections['id2']['step'];
$this->_sections['id2']['index_next'] = $this->_sections['id2']['index'] + $this->_sections['id2']['step'];
$this->_sections['id2']['first']      = ($this->_sections['id2']['iteration'] == 1);
$this->_sections['id2']['last']       = ($this->_sections['id2']['iteration'] == $this->_sections['id2']['total']);
?>
			<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][2][$this->_sections['id2']['index']] != ""): ?>
 				<li><?php echo $this->_tpl_vars['album_details'][$this->_sections['id']['index']][2][$this->_sections['id2']['index']]; ?>
</li>
  			<?php endif; ?>
		<?php endfor; endif; ?>
		</ul>
</div>
<?php else: ?>
<div id="sd2"></div>
	<?php endif; ?>


<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][1][0] != ""): ?>
<div id="sd">
		<ul>
		<?php unset($this->_sections['id2']);
$this->_sections['id2']['name'] = 'id2';
$this->_sections['id2']['loop'] = is_array($_loop=$this->_tpl_vars['album_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id2']['show'] = true;
$this->_sections['id2']['max'] = $this->_sections['id2']['loop'];
$this->_sections['id2']['step'] = 1;
$this->_sections['id2']['start'] = $this->_sections['id2']['step'] > 0 ? 0 : $this->_sections['id2']['loop']-1;
if ($this->_sections['id2']['show']) {
    $this->_sections['id2']['total'] = $this->_sections['id2']['loop'];
    if ($this->_sections['id2']['total'] == 0)
        $this->_sections['id2']['show'] = false;
} else
    $this->_sections['id2']['total'] = 0;
if ($this->_sections['id2']['show']):

            for ($this->_sections['id2']['index'] = $this->_sections['id2']['start'], $this->_sections['id2']['iteration'] = 1;
                 $this->_sections['id2']['iteration'] <= $this->_sections['id2']['total'];
                 $this->_sections['id2']['index'] += $this->_sections['id2']['step'], $this->_sections['id2']['iteration']++):
$this->_sections['id2']['rownum'] = $this->_sections['id2']['iteration'];
$this->_sections['id2']['index_prev'] = $this->_sections['id2']['index'] - $this->_sections['id2']['step'];
$this->_sections['id2']['index_next'] = $this->_sections['id2']['index'] + $this->_sections['id2']['step'];
$this->_sections['id2']['first']      = ($this->_sections['id2']['iteration'] == 1);
$this->_sections['id2']['last']       = ($this->_sections['id2']['iteration'] == $this->_sections['id2']['total']);
?>
			<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][1][$this->_sections['id2']['index']] != ""): ?>
 				<li><?php echo $this->_tpl_vars['album_details'][$this->_sections['id']['index']][1][$this->_sections['id2']['index']]; ?>
</li>
  			<?php endif; ?>
		<?php endfor; endif; ?>
		</ul>
</div>
<?php else: ?>
<div id="sd2"></div>
	<?php endif; ?>

<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][0][0] != ""): ?>
<div id="sd" style="background-color: #FFFFFF;">
		<ul>
		<?php unset($this->_sections['id2']);
$this->_sections['id2']['name'] = 'id2';
$this->_sections['id2']['loop'] = is_array($_loop=$this->_tpl_vars['album_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id2']['show'] = true;
$this->_sections['id2']['max'] = $this->_sections['id2']['loop'];
$this->_sections['id2']['step'] = 1;
$this->_sections['id2']['start'] = $this->_sections['id2']['step'] > 0 ? 0 : $this->_sections['id2']['loop']-1;
if ($this->_sections['id2']['show']) {
    $this->_sections['id2']['total'] = $this->_sections['id2']['loop'];
    if ($this->_sections['id2']['total'] == 0)
        $this->_sections['id2']['show'] = false;
} else
    $this->_sections['id2']['total'] = 0;
if ($this->_sections['id2']['show']):

            for ($this->_sections['id2']['index'] = $this->_sections['id2']['start'], $this->_sections['id2']['iteration'] = 1;
                 $this->_sections['id2']['iteration'] <= $this->_sections['id2']['total'];
                 $this->_sections['id2']['index'] += $this->_sections['id2']['step'], $this->_sections['id2']['iteration']++):
$this->_sections['id2']['rownum'] = $this->_sections['id2']['iteration'];
$this->_sections['id2']['index_prev'] = $this->_sections['id2']['index'] - $this->_sections['id2']['step'];
$this->_sections['id2']['index_next'] = $this->_sections['id2']['index'] + $this->_sections['id2']['step'];
$this->_sections['id2']['first']      = ($this->_sections['id2']['iteration'] == 1);
$this->_sections['id2']['last']       = ($this->_sections['id2']['iteration'] == $this->_sections['id2']['total']);
?>
			<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][0][$this->_sections['id2']['index']] != ""): ?>
 				<li><?php echo $this->_tpl_vars['album_details'][$this->_sections['id']['index']][0][$this->_sections['id2']['index']]; ?>
</li>
  			<?php endif; ?>
		<?php endfor; endif; ?>
		</ul>
</div>
<?php else: ?>
<div id="sd2"></div>
	<?php endif; ?>



<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][3][0] != ""): ?>
<div id="sd">
		<ul>
		<?php unset($this->_sections['id2']);
$this->_sections['id2']['name'] = 'id2';
$this->_sections['id2']['loop'] = is_array($_loop=$this->_tpl_vars['album_details']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id2']['show'] = true;
$this->_sections['id2']['max'] = $this->_sections['id2']['loop'];
$this->_sections['id2']['step'] = 1;
$this->_sections['id2']['start'] = $this->_sections['id2']['step'] > 0 ? 0 : $this->_sections['id2']['loop']-1;
if ($this->_sections['id2']['show']) {
    $this->_sections['id2']['total'] = $this->_sections['id2']['loop'];
    if ($this->_sections['id2']['total'] == 0)
        $this->_sections['id2']['show'] = false;
} else
    $this->_sections['id2']['total'] = 0;
if ($this->_sections['id2']['show']):

            for ($this->_sections['id2']['index'] = $this->_sections['id2']['start'], $this->_sections['id2']['iteration'] = 1;
                 $this->_sections['id2']['iteration'] <= $this->_sections['id2']['total'];
                 $this->_sections['id2']['index'] += $this->_sections['id2']['step'], $this->_sections['id2']['iteration']++):
$this->_sections['id2']['rownum'] = $this->_sections['id2']['iteration'];
$this->_sections['id2']['index_prev'] = $this->_sections['id2']['index'] - $this->_sections['id2']['step'];
$this->_sections['id2']['index_next'] = $this->_sections['id2']['index'] + $this->_sections['id2']['step'];
$this->_sections['id2']['first']      = ($this->_sections['id2']['iteration'] == 1);
$this->_sections['id2']['last']       = ($this->_sections['id2']['iteration'] == $this->_sections['id2']['total']);
?>
			<?php if ($this->_tpl_vars['album_details'][$this->_sections['id']['index']][3][$this->_sections['id2']['index']] != ""): ?>
 				<li><?php echo $this->_tpl_vars['album_details'][$this->_sections['id']['index']][3][$this->_sections['id2']['index']]; ?>
</li>
  			<?php endif; ?>
		<?php endfor; endif; ?>
		</ul>
</div>
<?php else: ?>
<div id="sd2"></div>
	<?php endif; ?>



<?php endfor; endif;  endif; ?>

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
autor: <?php echo $this->_tpl_vars['review_autors_list'][$this->_sections['id']['index']]; ?>

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
<?php endfor; endif; ?>

<?php if ($this->_tpl_vars['hhbdurlname'] != ""): ?>
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-review.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
<input type="hidden" name="urlname" value="<?php echo $this->_tpl_vars['urlname']; ?>
">
<strong>TYTUŁ: </strong><input type="text" name="title" class="commentinput" style="width: 420px">
<textarea name="review" lines="12" class="commentta" style="height: 150px"></textarea>
<div style="float: left;">
<input type="hidden" name="addedby" value="<?php echo $this->_tpl_vars['hhbduserid']; ?>
">
<input type="hidden" name="addedbyurlname" value="<?php echo $this->_tpl_vars['hhbdurlname']; ?>
">
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">
Dodaj swoją recenzję albumu. Nasi moderatorzy sprawdzą ją jak najszybciej będzie to możliwe. Do tego czasu będzie widoczna w Twoim profilu, a po moderacji od razu pojawi się na stronie.
</div>
</div>
</div>
<?php endif;  endif; ?>


<?php if ($this->_tpl_vars['add'] == 'oceny'): ?>
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['album_ratings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-news.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>