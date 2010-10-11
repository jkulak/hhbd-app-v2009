<?php /* Smarty version 2.6.9, created on 2010-10-10 13:57:24
         compiled from site/name.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="maincontainer">

<div id="namenavbar">

<?php if ($this->_tpl_vars['show_profile_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/profil">PROFIL</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_album_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/albumy">ALBUMY</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_guest_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/goscinnie">GOŚCINNIE</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_rap_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/rap">RAP</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_music_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/muzyka">MUZYKA</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_scratch_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/skrecze">SKRECZE</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_news_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/newsy">NEWSY</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_concert_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/imprezy">IMPREZY</a>
</div>
<?php endif; ?>

<div id="nametab" class="nametab">
<a href="/n/<?php echo $this->_tpl_vars['urlname']; ?>
/komentarze">KOMENTARZE</a>
</div>

</div>




<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/artists/<?php echo $this->_tpl_vars['photourl']; ?>
" alt="<?php echo $this->_tpl_vars['photohint']; ?>
" border="0">
<div id="fotosign"><?php echo $this->_tpl_vars['photohint']; ?>
</div>
</div>

<?php if ($this->_tpl_vars['hhbdurlname'] != ""):  if ($this->_tpl_vars['realname'] != ""): ?>
<div id="lsh">NAZYWA SIĘ</div>
<div id="lsi"><?php echo $this->_tpl_vars['realname']; ?>
</div>
<?php endif;  endif; ?>

<?php if ($this->_tpl_vars['city'] != ""): ?>
<div id="lsh">MIASTO</div>
<div id="lsi"><?php echo $this->_tpl_vars['city']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['website'] != ""): ?>
<div id="lsh">STRONA OFICJALNA</div>
<div id="lsi"><?php echo $this->_tpl_vars['website']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['alsoknownas_list'][0] != ""): ?>
<div id="lsh">ZNANY TAKŻE JAKO</div>
<div id="lsi">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['alsoknownas_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['top30'] != ""): ?>
<div id="lsh">HHBD.PL TOP30</div>
<div id="lsi">
#<?php echo $this->_tpl_vars['top30']; ?>

</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['projects_list'][0] != ""): ?>
<div id="lsh">PROJEKTY</div>
<div id="lsi">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['projects_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['members_list'][0] != ""): ?>
<div id="lsh">SKŁAD</div>
<div id="lsi">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['members_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['concertinfo'] != ""): ?>
<div id="lsh">INFO KONCERTOWE/booking</div>
<div id="lsi"><?php echo $this->_tpl_vars['concertinfo']; ?>
</div>
<?php endif; ?>

<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>wyświetleń: <?php echo $this->_tpl_vars['viewed']; ?>
</li>
<li>komentarzy: <?php echo $this->_tpl_vars['commentcount']; ?>
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


<?php if ($this->_tpl_vars['add'] == 'profil'): ?>
<div id="text" class="profil">
<?php echo $this->_tpl_vars['profile']; ?>

</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['add'] == 'albumy'): ?>

<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['ownalbum_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

<div id="name_news_header">
<?php echo $this->_tpl_vars['ownalbum_titles_list'][$this->_sections['id']['index']]; ?>

</div>

<div id="name_news_body" class="name_news_read" style="	overflow: auto;">

<div id="name_album_thumb">
<a href="/a/<?php echo $this->_tpl_vars['ownalbum_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['ownalbum_covers_list'][$this->_sections['id']['index']]; ?>
" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: <?php echo $this->_tpl_vars['name']; ?>
</li>
<li>wytwórnia: <?php echo $this->_tpl_vars['ownalbum_labels_list'][$this->_sections['id']['index']]; ?>
</li>
<li>rok wydania: <?php echo $this->_tpl_vars['ownalbum_years_list'][$this->_sections['id']['index']]; ?>
</li>
<?php if ($this->_tpl_vars['ownalbum_sns_list'][$this->_sections['id']['index']] != ""): ?><li>#kat: <?php echo $this->_tpl_vars['ownalbum_sns_list'][$this->_sections['id']['index']]; ?>
</li><?php endif; ?>
</ul>
</div>

<div id="name_album_buy">

</div>

</div>
<?php endfor; endif; ?>

<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['album_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="name_news_header">
<?php echo $this->_tpl_vars['album_titles_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="name_news_body" class="name_news_read" >
<div id="name_album_thumb">
<a href="/a/<?php echo $this->_tpl_vars['album_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['album_covers_list'][$this->_sections['id']['index']]; ?>
" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: <?php echo $this->_tpl_vars['album_artists_list'][$this->_sections['id']['index']]; ?>
</li>
<li>wytwórnia: <?php echo $this->_tpl_vars['album_labels_list'][$this->_sections['id']['index']]; ?>
</li>
<li>rok wydania: <?php echo $this->_tpl_vars['album_years_list'][$this->_sections['id']['index']]; ?>
</li>
<?php if ($this->_tpl_vars['album_sns_list'][$this->_sections['id']['index']] != ""): ?><li>#kat: <?php echo $this->_tpl_vars['album_sns_list'][$this->_sections['id']['index']]; ?>
</li><?php endif; ?>
</ul>
</div>

<div id="name_album_buy">


</div>

</div>
<?php endfor; endif; ?>

<?php endif; ?>




<?php if ($this->_tpl_vars['add'] == 'goscinnie'): ?>
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['guest_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['add'] == 'skrecze'): ?>
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['scratch_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['add'] == 'muzyka'): ?>
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['music_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['add'] == 'rap'): ?>
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['rap_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['add'] == 'imprezy'):  unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['concert_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="name_news_header" <?php echo $this->_tpl_vars['concert_done_list'][$this->_sections['id']['index']]; ?>
>
<?php echo $this->_tpl_vars['concert_titles_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="name_news_header_left">
<?php echo $this->_tpl_vars['concert_dates_list'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['concert_places_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="name_news_body" class="name_news_read"><?php echo $this->_tpl_vars['concert_descriptions_list'][$this->_sections['id']['index']]; ?>
 <a href="/p/<?php echo $this->_tpl_vars['concert_ids_list'][$this->_sections['id']['index']]; ?>
" class="readmore">>></a></a></div>

<?php endfor; endif;  endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-news.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-comments.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>

</div>
