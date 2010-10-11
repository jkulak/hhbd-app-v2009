<?php /* Smarty version 2.6.9, created on 2010-10-10 11:41:17
         compiled from site/news.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="maincontainer">

<div id="leftcolumn">


<div id="lsh">SKRÓT NEWSÓW</div>
<div id="lsi">


<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['news_dates_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="news_short">
<h3><?php echo $this->_tpl_vars['news_titles_list'][$this->_sections['id']['index']]; ?>
</h3>
<div id="newssign"><?php echo $this->_tpl_vars['news_dates_list'][$this->_sections['id']['index']]; ?>
</div>
<div id="news_image"><a href="/news/<?php echo $this->_tpl_vars['news_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/news-glyphs/<?php echo $this->_tpl_vars['news_glyphs_list'][$this->_sections['id']['index']]; ?>
" border="0"></a></div>
<?php echo $this->_tpl_vars['news_list'][$this->_sections['id']['index']]; ?>
</i></strong></b>
<div id="news_info">[czytany: <?php echo $this->_tpl_vars['news_reads_list'][$this->_sections['id']['index']]; ?>
, komentarzy: <?php echo $this->_tpl_vars['news_comments_list'][$this->_sections['id']['index']]; ?>
]</div>
<div id="hr"></div>

<hr>
</div>
<?php endfor; endif; ?>


</div>


</div>

<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;"><?php echo $this->_tpl_vars['subtitle']; ?>
</h1>
</div>
</div>

<div id="name_news_body">


<div id="news_image">
<a href="#" onClick="window.open('/imgs/database/news/<?php echo $this->_tpl_vars['img']; ?>
','_blank','');">
<img src="/imgs/database/news-thumbs/<?php echo $this->_tpl_vars['newsimg']; ?>
" border="0">
</a>
</div>


<div id="news_main_news"  class="profil">
<?php echo $this->_tpl_vars['news']; ?>

</div>

<div id="newssign">dodany przez: <strong><?php echo $this->_tpl_vars['addedby']; ?>
</strong> (<?php echo $this->_tpl_vars['added']; ?>
), wyswietleń: <?php echo $this->_tpl_vars['viewed']; ?>
</div>

</div>
<!--
<div id="name_news_header">KOMENTARZE (NIŻEJ NA STRONIE)</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">

<li><a href="#c">Czytaj</a></li>
<li><a href="#ac">Dodaj</a></li>

</ul>
</div>
-->

<?php if ($this->_tpl_vars['refartists'] != "" || $this->_tpl_vars['reflabels'] != "" || $this->_tpl_vars['refconcerts'] != ""): ?>
<div id="name_news_header">POWIĄZANE LINKI</div>
<div id="tracklist">
<ul class="listanumerowana">
<?php if ($this->_tpl_vars['refartists'] != ""): ?><li><?php echo $this->_tpl_vars['refartists']; ?>
</li><?php endif;  if ($this->_tpl_vars['reflabels'] != ""): ?><li><?php echo $this->_tpl_vars['reflabels']; ?>
</li><?php endif;  if ($this->_tpl_vars['refconcerts'] != ""): ?><li><?php echo $this->_tpl_vars['refconcerts']; ?>
</li><?php endif; ?>
</ul>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['refalbums'][0] != ""): ?>
<div id="name_news_header">POWIĄZANE ALBUMY</div>
<div id="name_news_body" class="name_news_read">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['refalbums']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 echo $this->_tpl_vars['refalbums'][$this->_sections['id']['index']]; ?>

<?php endfor; endif; ?>
</div>
<?php endif; ?>

<!--
<div id="name_news_header">NAJPOPULARNIEJSZE NEWS'Y</div>
<div id="name_news_body" class="name_news_read">
<table width="480" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="240" valign="top"><ul><?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['titles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<li><?php echo $this->_tpl_vars['titles'][$this->_sections['id']['index']]; ?>
<div id="newssign">dodany: <?php echo $this->_tpl_vars['added1'][$this->_sections['id']['index']]; ?>
</div></li>
<?php endfor; endif; ?></ul></td>
    <td width="240" valign="top"><ul><?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['titles2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<li><?php echo $this->_tpl_vars['titles2'][$this->_sections['id']['index']]; ?>
<div id="newssign">dodany: <?php echo $this->_tpl_vars['added2'][$this->_sections['id']['index']]; ?>
</div></li>
<?php endfor; endif; ?></ul></td>
  </tr>
</table>



</div>
-->


<a name="c"><div id="name_news_header">KOMENTARZE</div></a>
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['comments_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<?php echo $this->_tpl_vars['comments_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="commentbox_sig" class="sig">

dodany: <strong>
<?php if ($this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']] != ""): ?>
<a href="/u/<?php echo $this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']]; ?>
"><?php echo $this->_tpl_vars['comments_autors_list'][$this->_sections['id']['index']]; ?>
</a>
<?php else:  echo $this->_tpl_vars['comments_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>

</strong> (<?php echo $this->_tpl_vars['comments_dates_list'][$this->_sections['id']['index']]; ?>
)

</div>
</div>
<?php endfor; endif; ?>

<a name="ac"><div id="commentbox"></a>

<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-news-comment.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['s']; ?>
">
<input type="hidden" name="urlname" value="<?php echo $this->_tpl_vars['urlname']; ?>
">
<textarea name="comment" lines="3" class="commentta"></textarea>
<div style="float: left;">
<?php if ($this->_tpl_vars['hhbdlogin'] != ""): ?>
<input type="hidden" name="addedby" value="<?php echo $this->_tpl_vars['hhbdlogin']; ?>
">
<input type="hidden" name="addedbyurlname" value="<?php echo $this->_tpl_vars['hhbdurlname']; ?>
">
<?php else: ?>
<strong>PODPIS:</strong><input type="text" name="addedby" class="commentinput">
<?php endif; ?>
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">
Dodaj swój komentarz, lecz pamiętaj, że razem z Twoją wypowiedzią zostanie zapisany Twój adres IP oraz nazwa host'a (<?php echo $this->_tpl_vars['host']; ?>
). W przypadku naruszenia czyichkolwiek dóbr osobistych informacja ta będzie udostępniona odpowiednim organom.
</div>
</div>
</div>


</div>
</div>