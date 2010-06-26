<?php /* Smarty version 2.6.9, created on 2008-11-23 15:58:07
         compiled from site/recommend-site-form.tpl */ ?>
<div id="sitetitle">
<div id="titleleft">
<h1><?php echo $this->_tpl_vars['ctitle']; ?>
</h1>
</div>
</div>

<div id="maincontainer">

<div id="leftcolumn">
<div id="lsh">
INFO
</div>
<div id="lsi">
<p>
Jeśli uważasz, że Twój znajomy będzie zainteresowany tą stroną, wyślij mu maila z bezpośrednim linkiem do niej.
</p>
<p>
Zespół hhbd.pl wykorzysta podany adres e-mail, tylko i wyłącznie do wysłania maila.
</p>
<p>
Po wypełnieniu obu pól, wciśnij 'WYŚLIJ', aby go wysłać.
</p>
</div>
</div>

<div id="rightcolumn">
POLECANA STRONA:
<p><strong><?php echo $this->_tpl_vars['link']; ?>
</strong></p>
<form method="post" action="/recommendsite">
<p>
<ul>
<li><input type="text" name="email"> docelowy adres e-mail</li>
<li><input type="text" name="signature"> Twój podpis</li>
<input type="hidden" name="sid" value="<?php echo $this->_tpl_vars['sid']; ?>
">
<input type="hidden" name="add" value="<?php echo $this->_tpl_vars['add']; ?>
">
</ul>
</p>
<p>
<input type="submit" value="WYŚLIJ" class="commentit">
</p>
</form>
</div>


</div>