<?php /* Smarty version 2.6.9, created on 2010-06-26 20:45:24
         compiled from index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="pl" /> 

<META name="robots" content="index,follow">
<META name="description" content="<?php echo $this->_tpl_vars['description']; ?>
">
<META name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
<META name="Author" content="www.hhbd.pl">
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['maindir']; ?>
/css/hhbd.css" type="text/css">

</head>

<body>
<div id="container">
<div id="logo">
<div id="logomain">
<a href="/"><img src="<?php echo $this->_tpl_vars['maindir']; ?>
/hhbdlogo.gif" border=0></a>
</div>
<div id="logostats">
<ul>
<li>postaci: <?php echo $this->_tpl_vars['artist_count']; ?>
</li>
<li>albumów: <?php echo $this->_tpl_vars['album_count']; ?>
</li>
<li>zapowiedzi: <?php echo $this->_tpl_vars['announce_count']; ?>
</li>
<li>wytwórni: <?php echo $this->_tpl_vars['label_count']; ?>
</li>
<li>newsów: <?php echo $this->_tpl_vars['news_count']; ?>
</li>
<li>imprez: <?php echo $this->_tpl_vars['concert_count']; ?>
</li>
<li>teledysków: <?php echo $this->_tpl_vars['clip_count']; ?>
</li>
<li>cen albumów: <?php echo $this->_tpl_vars['price_count']; ?>
</li>
</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "part-loginform.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
</div>
<div id="advtop">
<img src="/add.gif">
</div>
<?php if ($this->_tpl_vars['errmsg'] != ""): ?><div id="errmsg"><?php echo $this->_tpl_vars['errmsg']; ?>
</div><?php endif; ?>
<div id="menu" class="menu">
<div id="menuleft">
<form method="post" action="/wyszukaj" class="s_frm">
<input type="text" name="searchstring" class="s_ed">
<input type="submit" value="SZUKAJ" class="s_btn"> 
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['s']; ?>
">
<input type="hidden" name="urlname" value="<?php echo $this->_tpl_vars['urlname']; ?>
">
</form>
</div>
<div id="menuright">
<?php if ($this->_tpl_vars['hhbdurlname'] == 'fee'): ?><a href="/statystyki">statystyki</a> | <?php endif; ?><a href="<?php echo $this->_tpl_vars['maindir']; ?>
/"><strong>Strona główna</strong></a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/news">News</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/top10">TOP10</a><BR>
<a href="<?php echo $this->_tpl_vars['maindir']; ?>
/albumy">Albumy</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/zapowiedzi">Zapowiedzi</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/wykonawcy">Wykonawcy</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/wytwornie">Wytwórnie</a>
</div>
</div>
<div id="main" class="main">
<?php if ($this->_tpl_vars['history'] != ""): ?>
<div class="history">
<?php echo $this->_tpl_vars['history']; ?>

</div>
<?php endif;  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['body_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="footer" class="menu">
<div id="footerleft">
<a href="<?php echo $this->_tpl_vars['maindir']; ?>
/ohhbd">o hhbd.pl</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/kontakt">kontakt</a> | <a href="<?php echo $this->_tpl_vars['maindir']; ?>
/zasadyuzytkowania">zasady użytkowania</a>
</div>
<div id="footerright">
&copy; 2004-2008 HHBD.PL, PROJEKT I WYKONANIE: <a href="http://www.webascrazy.net" target="_blank">webascrazy.net</a>
</div></div></div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-3311418-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>