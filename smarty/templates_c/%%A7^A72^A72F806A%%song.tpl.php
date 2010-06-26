<?php /* Smarty version 2.6.9, created on 2008-11-23 14:44:58
         compiled from site/song.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "site/part-site-title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="maincontainer">

<div id="leftcolumn">

<?php if ($this->_tpl_vars['length'] != ""): ?><div id="lsh">CZAS TRWANIA</div><div id="lsi"><?php echo $this->_tpl_vars['length']; ?>
</div><?php endif; ?>

<?php if ($this->_tpl_vars['rap'][0] != ""): ?><div id="lsh">RAP</div><div id="lsi"><ul  class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['rap']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><li><?php echo $this->_tpl_vars['rap'][$this->_sections['id']['index']]; ?>
</li><?php endfor; endif; ?></ul></div><?php endif; ?>

<?php if ($this->_tpl_vars['music'][0] != ""): ?><div id="lsh">MUYZKA</div><div id="lsi"><ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['music']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><li><?php echo $this->_tpl_vars['music'][$this->_sections['id']['index']]; ?>
</li><?php endfor; endif; ?></ul></div><?php endif; ?>

<?php if ($this->_tpl_vars['feat'][0] != ""): ?><div id="lsh">GOŚCINNIE</div><div id="lsi"><ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['feat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><li><?php echo $this->_tpl_vars['feat'][$this->_sections['id']['index']]; ?>
</li><?php endfor; endif; ?></ul></div><?php endif; ?>

<?php if ($this->_tpl_vars['scratch'][0] != ""): ?><div id="lsh">SKRECZE / CUTY</div><div id="lsi"><ul class="listanumerowana">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['scratch']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><li><?php echo $this->_tpl_vars['scratch'][$this->_sections['id']['index']]; ?>
</li><?php endfor; endif; ?></ul></div><?php endif; ?>


<div id="lsh">INFO</div><div id="lsi"><UL>
<li>wyświetleń: <?php echo $this->_tpl_vars['viewed']; ?>
</li>
</UL></div>

</div>



<div id="rightcolumn">

<div id="name_news_header">NA ALBUMACH</div>
<div id="name_news_body" class="name_news_read">

<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['onalbums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

</div>




<div id="name_news_header">WYKORZYSTANE SAMPLE</div>
<div id="name_news_body" class="name_news_read">
<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['samples']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
<li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from);  if ($this->_tpl_vars['hhbdlogin'] != ""): ?><li class="itemnumerowany"><a href="/dodajsampel/<?php echo $this->_tpl_vars['urlname']; ?>
">DODAJ SAMPEL</a></li><?php endif;  if ($this->_tpl_vars['hhbdlogin'] == ""): ?><li class="itemnumerowany">ZALOGUJ SIĘ BY DODAĆ SAMPEL</li><?php endif; ?>
</ul>
</div>


<?php if ($this->_tpl_vars['lyrics'] != ""): ?>
<div id="name_news_header">TEKST</div>
<div id="name_news_body" class="name_news_read"><?php echo $this->_tpl_vars['lyrics']; ?>
</div>
<?php endif; ?>


</div>

</div>