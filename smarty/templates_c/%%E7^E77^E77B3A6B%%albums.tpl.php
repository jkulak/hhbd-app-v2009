<?php /* Smarty version 2.6.9, created on 2008-11-23 14:43:38
         compiled from site/albums.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['subtitle']; ?>
</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
<?php echo $this->_tpl_vars['switch']; ?>

</div>


<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['concerts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

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

<div id="name_news_body" class="name_news_read">

<div id="name_album_thumb">
<a href="/a/<?php echo $this->_tpl_vars['ownalbum_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['ownalbum_covers_list'][$this->_sections['id']['index']]; ?>
" border="0"></a>
</div>

<div id="name_album_info">
<ul>
<li>wykonawca: <?php echo $this->_tpl_vars['ownalbum_artists_list'][$this->_sections['id']['index']]; ?>
</li>
<li>wytwórnia: <?php echo $this->_tpl_vars['ownalbum_labels_list'][$this->_sections['id']['index']]; ?>
</li>
<li><?php echo $this->_tpl_vars['ownalbum_years_list'][$this->_sections['id']['index']]; ?>
</li>
<?php if ($this->_tpl_vars['ownalbum_sns_list'][$this->_sections['id']['index']] != ""): ?><li>#kat: <?php echo $this->_tpl_vars['ownalbum_sns_list'][$this->_sections['id']['index']]; ?>
</li><?php endif; ?>
</ul>
</div>

<div id="name_album_buy">

</div>

</div>

<?php endfor; endif; ?>

<div id="letterswitch" class="letterswitch">
<?php echo $this->_tpl_vars['switch']; ?>

</div>
