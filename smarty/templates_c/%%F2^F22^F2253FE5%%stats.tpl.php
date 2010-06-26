<?php /* Smarty version 2.6.9, created on 2005-09-22 20:48:31
         compiled from sys/stats.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">
<div id="leftcolumn">
<div id="lsh">WSZYSTKICH</div>
<div id="lsi"><?php echo $this->_tpl_vars['all_count']; ?>
</div>
<div id="lsh">DZISIAJ</div>
<div id="lsi"><?php echo $this->_tpl_vars['today_count']; ?>
</div>
<div id="lsh">WCZORAJ</div>
<div id="lsi"><?php echo $this->_tpl_vars['yesterday_count']; ?>
</div>
</div>

<div id="rightcolumn">
<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;"><?php echo $this->_tpl_vars['sectiontitle']; ?>
</h1>
</div>
</div>

<ul style="font-size: 9px;">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['last_clicks']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<li><?php echo $this->_tpl_vars['last_clicks'][$this->_sections['id']['index']]; ?>
</li>
<?php endfor; endif; ?>
</ul>

</div>
</div>

