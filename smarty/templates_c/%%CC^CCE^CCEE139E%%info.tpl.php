<?php /* Smarty version 2.6.9, created on 2008-11-26 10:00:34
         compiled from info.tpl */ ?>
<div id="sitetitle" <?php if ($this->_tpl_vars['infotype'] == 'error'): ?> style="background-color: red;"<?php endif; ?> <?php if ($this->_tpl_vars['infotype'] == 'ok'): ?> style="background-color: green;"<?php endif; ?>>
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">
<?php echo $this->_tpl_vars['info']; ?>

</div>