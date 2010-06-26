<?php /* Smarty version 2.6.9, created on 2005-10-01 15:22:00
         compiled from sys/comments.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">
<div id="leftcolumn">
<div id="lsh">WSZYSTKICH</div>
<div id="lsi"><?php echo $this->_tpl_vars['totalcount']; ?>
</div>
<div id="lsh">WYKONAWCOW</div>
<div id="lsi"><?php echo $this->_tpl_vars['ncommentcount']; ?>
</div>
<div id="lsh">ALBUMOW</div>
<div id="lsi"><?php echo $this->_tpl_vars['acommentcount']; ?>
</div>
<div id="lsh">NEWSOW</div>
<div id="lsi"><?php echo $this->_tpl_vars['newscommentcount']; ?>
</div>
<div id="lsh">KONCERTOW</div>
<div id="lsi"><?php echo $this->_tpl_vars['pcommentcount']; ?>
</div>



</div>

<div id="rightcolumn">


<div id="name_news_header">WYKONAWCY</div>
<div id="name_news_body" class="name_news_read">
<?php unset($this->_sections['id']);
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
<?php else: ?>
<?php echo $this->_tpl_vars['comments_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>
</strong> (<?php echo $this->_tpl_vars['comments_dates_list'][$this->_sections['id']['index']]; ?>
), <?php echo $this->_tpl_vars['comments_aid_list'][$this->_sections['id']['index']]; ?>

</div>
</div>
<?php endfor; endif; ?>
</div>



<div id="name_news_header">ALBUMY</div>
<div id="name_news_body" class="name_news_read">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['comments_a_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['comments_a_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
<?php if ($this->_tpl_vars['comments_a_autor_ids_list'][$this->_sections['id']['index']] != ""): ?>
<a href="/u/<?php echo $this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']]; ?>
"><?php echo $this->_tpl_vars['comments_a_autors_list'][$this->_sections['id']['index']]; ?>
</a>
<?php else: ?>
<?php echo $this->_tpl_vars['comments_a_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>
</strong> (<?php echo $this->_tpl_vars['comments_a_dates_list'][$this->_sections['id']['index']]; ?>
), <?php echo $this->_tpl_vars['comments_a_aid_list'][$this->_sections['id']['index']]; ?>

</div>
</div>
<?php endfor; endif; ?>
</div>




<div id="name_news_header">NEWSY</div>
<div id="name_news_body" class="name_news_read">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['comments_news_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['comments_news_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
<?php if ($this->_tpl_vars['comments_news_autor_ids_list'][$this->_sections['id']['index']] != ""): ?>
<a href="/u/<?php echo $this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']]; ?>
"><?php echo $this->_tpl_vars['comments_news_autors_list'][$this->_sections['id']['index']]; ?>
</a>
<?php else: ?>
<?php echo $this->_tpl_vars['comments_news_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>
</strong> (<?php echo $this->_tpl_vars['comments_news_dates_list'][$this->_sections['id']['index']]; ?>
), <?php echo $this->_tpl_vars['comments_news_aid_list'][$this->_sections['id']['index']]; ?>

</div>
</div>
<?php endfor; endif; ?>
</div>



<div id="name_news_header">KONCERTY</div>
<div id="name_news_body" class="name_news_read">
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['comments_p_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php echo $this->_tpl_vars['comments_p_list'][$this->_sections['id']['index']]; ?>

</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
<?php if ($this->_tpl_vars['comments_p_autor_ids_list'][$this->_sections['id']['index']] != ""): ?>
<a href="/u/<?php echo $this->_tpl_vars['comments_autor_ids_list'][$this->_sections['id']['index']]; ?>
"><?php echo $this->_tpl_vars['comments_p_autors_list'][$this->_sections['id']['index']]; ?>
</a>
<?php else: ?>
<?php echo $this->_tpl_vars['comments_p_autors_list'][$this->_sections['id']['index']]; ?>

<?php endif; ?>
</strong> (<?php echo $this->_tpl_vars['comments_p_dates_list'][$this->_sections['id']['index']]; ?>
), <?php echo $this->_tpl_vars['comments_p_aid_list'][$this->_sections['id']['index']]; ?>

</div>
</div>
<?php endfor; endif; ?>
</div>




</div>
</div>

