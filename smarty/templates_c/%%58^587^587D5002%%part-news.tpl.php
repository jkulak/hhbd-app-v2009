<?php /* Smarty version 2.6.9, created on 2008-11-23 14:48:30
         compiled from site/part-news.tpl */ ?>
<?php if ($this->_tpl_vars['add'] == 'newsy'):  unset($this->_sections['news']);
$this->_sections['news']['name'] = 'news';
$this->_sections['news']['loop'] = is_array($_loop=$this->_tpl_vars['news_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['news']['show'] = true;
$this->_sections['news']['max'] = $this->_sections['news']['loop'];
$this->_sections['news']['step'] = 1;
$this->_sections['news']['start'] = $this->_sections['news']['step'] > 0 ? 0 : $this->_sections['news']['loop']-1;
if ($this->_sections['news']['show']) {
    $this->_sections['news']['total'] = $this->_sections['news']['loop'];
    if ($this->_sections['news']['total'] == 0)
        $this->_sections['news']['show'] = false;
} else
    $this->_sections['news']['total'] = 0;
if ($this->_sections['news']['show']):

            for ($this->_sections['news']['index'] = $this->_sections['news']['start'], $this->_sections['news']['iteration'] = 1;
                 $this->_sections['news']['iteration'] <= $this->_sections['news']['total'];
                 $this->_sections['news']['index'] += $this->_sections['news']['step'], $this->_sections['news']['iteration']++):
$this->_sections['news']['rownum'] = $this->_sections['news']['iteration'];
$this->_sections['news']['index_prev'] = $this->_sections['news']['index'] - $this->_sections['news']['step'];
$this->_sections['news']['index_next'] = $this->_sections['news']['index'] + $this->_sections['news']['step'];
$this->_sections['news']['first']      = ($this->_sections['news']['iteration'] == 1);
$this->_sections['news']['last']       = ($this->_sections['news']['iteration'] == $this->_sections['news']['total']);
?>
<div id="name_news_header">
<?php echo $this->_tpl_vars['news_titles_list'][$this->_sections['news']['index']]; ?>

</div>
<div id="name_news_header_left">
<?php echo $this->_tpl_vars['news_added_list'][$this->_sections['news']['index']]; ?>

</div>
<div id="name_news_body" class="name_news_read"><?php echo $this->_tpl_vars['news_list'][$this->_sections['news']['index']]; ?>
 <a href="/news/<?php echo $this->_tpl_vars['news_ids_list'][$this->_sections['news']['index']]; ?>
" class="readmore">>></a></a></div>

<?php endfor; endif; ?>

<?php endif; ?>