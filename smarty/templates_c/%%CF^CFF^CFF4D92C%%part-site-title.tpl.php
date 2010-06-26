<?php /* Smarty version 2.6.9, created on 2008-11-23 14:44:58
         compiled from site/part-site-title.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
<div id="titleright">
<?php if ($this->_tpl_vars['hhbdurlname'] != ""): ?><div id="titletab" class="titletab"><a href="/blad/<?php echo $this->_tpl_vars['s']; ?>
/<?php echo $this->_tpl_vars['urlname']; ?>
">ZGŁOŚ BŁĄD</a></div><?php endif; ?>
<div id="titletab" class="titletab"><a href="/polec/<?php echo $this->_tpl_vars['s']; ?>
/<?php echo $this->_tpl_vars['urlname']; ?>
" rel="nofollow">POLEĆ ZNAJOMEMU</a></div>
</div>
</div>