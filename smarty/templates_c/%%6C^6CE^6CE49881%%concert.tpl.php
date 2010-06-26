<?php /* Smarty version 2.6.9, created on 2008-11-23 19:13:56
         compiled from site/concert.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="maincontainer">

<div id="namenavbar">

<div id="nametab" class="nametab">
<a href="/p/<?php echo $this->_tpl_vars['urlname']; ?>
">INFORMACJE</a>
</div>

<?php if ($this->_tpl_vars['show_news_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/p/<?php echo $this->_tpl_vars['urlname']; ?>
/newsy">NEWSY</a>
</div>
<?php endif; ?>

<div id="nametab" class="nametab">
<a href="/p/<?php echo $this->_tpl_vars['urlname']; ?>
/komentarze">KOMENTARZE</a>
</div>


</div>

<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/posters/<?php echo $this->_tpl_vars['poster']; ?>
">
</div>

<div id="lsh">DATA</div><div id="lsi"><?php echo $this->_tpl_vars['date']; ?>
</div>
<div id="lsh">MIASTO</div><div id="lsi"><?php echo $this->_tpl_vars['city']; ?>
</div>
<?php if ($this->_tpl_vars['website'] != ""): ?><div id="lsh">STRONA OFICJALNA</div><div id="lsi"><?php echo $this->_tpl_vars['website']; ?>
</div><?php endif;  if ($this->_tpl_vars['place'] != ""): ?><div id="lsh">MIEJSCE</div><div id="lsi"><?php echo $this->_tpl_vars['place']; ?>
</div><?php endif;  if ($this->_tpl_vars['start'] != ""): ?><div id="lsh">START</div><div id="lsi"><?php echo $this->_tpl_vars['start']; ?>
</div><?php endif;  if ($this->_tpl_vars['cost'] != ""): ?><div id="lsh">CENA</div><div id="lsi"><?php echo $this->_tpl_vars['cost']; ?>
</div><?php endif; ?>

<div id="lsh">INFO</div><div id="lsi"><UL>
<li>wyświetleń: <?php echo $this->_tpl_vars['viewed']; ?>
</li>
<li>komentarzy: <?php echo $this->_tpl_vars['commentcount']; ?>
</li>
<li>dodany: <?php echo $this->_tpl_vars['added']; ?>
</li>
</UL></div>

</div>



<div id="rightcolumn">

<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;"><?php echo $this->_tpl_vars['sectiontitle']; ?>
</h1>
</div>
</div>

<?php if ($this->_tpl_vars['add'] == 'informacje'): ?>
<div id="name_news_header">WYKONAWCY</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['concert_artists_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

<?php if ($this->_tpl_vars['cdescription'] != ""): ?>
<div id="name_news_header">OPIS IMPREZY</div>
<div id="name_news_body" class="name_news_read"><?php echo $this->_tpl_vars['cdescription']; ?>
</div>
<?php endif;  endif; ?>


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