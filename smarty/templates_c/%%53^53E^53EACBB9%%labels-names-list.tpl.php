<?php /* Smarty version 2.6.9, created on 2008-11-23 14:43:33
         compiled from site/labels-names-list.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['listname']; ?>
</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
<?php echo $this->_tpl_vars['namesletters']; ?>

</div>

<ul class="listanumerowana">
<?php $_from = $this->_tpl_vars['nameslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr']):
?>
  <li class="itemnumerowany"><?php echo $this->_tpl_vars['curr']; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>

<div id="letterswitch" class="letterswitch">
<?php echo $this->_tpl_vars['namesletters']; ?>

</div>