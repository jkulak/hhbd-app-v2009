<?php /* Smarty version 2.6.9, created on 2008-11-26 09:12:20
         compiled from site/concerts-list.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1>LISTA IMPREZ</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
miesiace? nie wiem co tutaj jeszcze. miasta? daty? cokolwiek?
</div>


<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['concerts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="name_news_body" class="name_news_read">
<div id="name_album_thumb">
<a href="/p/<?php echo $this->_tpl_vars['concertsurlnames'][$this->_sections['id']['index']]; ?>
">
<img src="/imgs/database/posters-thumbs/<?php echo $this->_tpl_vars['concertsthumbs'][$this->_sections['id']['index']]; ?>
" border="0" >
</a>
</div>
<?php echo $this->_tpl_vars['concerts'][$this->_sections['id']['index']]; ?>

 </div>
<?php endfor; endif; ?>
