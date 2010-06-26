<?php /* Smarty version 2.6.9, created on 2005-08-10 01:31:39
         compiled from site/submit-error.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">
<div id="lsh">
UWAGA
</div>
<div id="lsi">
<p>
Mimo, ¿e dok³adamy najwiêkszych starañ, aby publikowane przez nas informacje by³y wiarygodne i zgodne z prawd±, mo¿e zdarzyæ siê, ¿e gdzie¶ wyst±pi³ b³±d.
</p>
<p>
Proszê w okienku obok opisaæ b³±d, podaæ swoj±, ewentualn±, prawid³ow± wersjê i klikn±æ 'wy¶lij'.
</p>
<p>
B³±d, po uprzedniej weryfikacji, zostanie poprawiony najszybciej jak to bêdzie mo¿liwe.
</p>
</div>
</div>

<div id="rightcolumn">
<form method="post" action="/login">
<textarea name="message" lines="10" class="commentta"></textarea>
<input type="hidden" name="addedby" value="<?php echo $this->_tpl_vars['hhbdurlname']; ?>
">
<input type="hidden" name="sid" value="<?php echo $this->_tpl_vars['sid']; ?>
">
<input type="hidden" name="add" value="<?php echo $this->_tpl_vars['add']; ?>
">
<input type="submit" value="WY¦LIJ" class="commentit">
</form>
</div>


</div>