<?php /* Smarty version 2.6.9, created on 2010-10-10 12:55:04
         compiled from site/part-comments.tpl */ ?>
<?php if ($this->_tpl_vars['add'] == 'komentarze'):  unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['comments_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<?php echo $this->_tpl_vars['comments_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="commentbox_sig" class="sig">

dodany: <strong>
<?php if ($this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']] != ""): ?>
<a href="/u/<?php echo $this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']]; ?>
"><?php echo $this->_tpl_vars['comments_autors_list'][$this->_sections['id']['index']]; ?>
</a>
<?php else:  echo $this->_tpl_vars['comments_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>

</strong> (<?php echo $this->_tpl_vars['comments_dates_list'][$this->_sections['id']['index']]; ?>
)

</div>
</div>
<?php endfor; endif; ?>

<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-comment.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['s']; ?>
">
<input type="hidden" name="urlname" value="<?php echo $this->_tpl_vars['urlname']; ?>
">
<textarea name="comment" lines="10" class="commentta"></textarea>
<div style="float: left;">
<?php if ($this->_tpl_vars['hhbdlogin'] != ""): ?>
<input type="hidden" name="addedby" value="<?php echo $this->_tpl_vars['hhbdlogin']; ?>
">
<input type="hidden" name="addedbyurlname" value="<?php echo $this->_tpl_vars['hhbdurlname']; ?>
">
<?php else: ?>
<strong>PODPIS:</strong><input type="text" name="addedby" class="commentinput">
<?php endif; ?>
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">

</div>
</div>
</div>
<?php endif; ?>