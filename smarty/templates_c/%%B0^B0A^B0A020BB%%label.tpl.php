<?php /* Smarty version 2.6.9, created on 2010-10-10 15:31:04
         compiled from site/label.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="maincontainer">

<div id="namenavbar">

<?php if ($this->_tpl_vars['show_profile_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/l/<?php echo $this->_tpl_vars['urlname']; ?>
/profil">PROFIL</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_discog_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/l/<?php echo $this->_tpl_vars['urlname']; ?>
/wydawnictwa">WYDAWNICTWA</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_news_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/l/<?php echo $this->_tpl_vars['urlname']; ?>
/newsy">NEWSY</a>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['show_concert_tab'] == 1): ?>
<div id="nametab" class="nametab">
<a href="/l/<?php echo $this->_tpl_vars['urlname']; ?>
/imprezy">IMPREZY</a>
</div>
<?php endif; ?>

<div id="nametab" class="nametab">
<a href="/l/<?php echo $this->_tpl_vars['urlname']; ?>
/komentarze">KOMENTARZE</a>
</div>

</div>




<div id="leftcolumn">

<div id="main_picture">
<img src="/imgs/database/labels/<?php echo $this->_tpl_vars['logo']; ?>
" border="0">
</div>

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

<?php if ($this->_tpl_vars['email'] != ""): ?>
<div id="lsh">E-MAIL</div>
<div id="lsi"><?php echo $this->_tpl_vars['email']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['addres'] != ""): ?>
<div id="lsh">ADRES</div>
<div id="lsi"><?php echo $this->_tpl_vars['addres']; ?>
</div>
<?php endif; ?>


<div id="lsh">INFO</div>
<div id="lsi">
<UL>
<li>wydanych albumów: <?php echo $this->_tpl_vars['discogs_count']; ?>
</li>
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



<?php if ($this->_tpl_vars['add'] == 'wydawnictwa'): ?>
<table  width="496" border="0" cellspacing="3" cellpadding="4">

<tr bgcolor="#575757">
<td width="1px"><b><font color="#FFFFFF">ROK</font></b></td><td><b><font color="#FFFFFF">ALBUM</font></b></td><td><b><font color="#FFFFFF">#KAT</font></b></td>
</tr>

<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['label_discogs_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr bgcolor="#E7E7E7">
<td width="1px"><?php echo $this->_tpl_vars['label_years_list'][$this->_sections['id']['index']]; ?>
</td><td><?php echo $this->_tpl_vars['label_discogs_list'][$this->_sections['id']['index']]; ?>
</td><td><?php echo $this->_tpl_vars['label_nums_list'][$this->_sections['id']['index']]; ?>
</td>
</tr>
<?php endfor; endif; ?>

</table>
<?php endif; ?>

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
