<?php /* Smarty version 2.6.9, created on 2010-10-10 15:25:43
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.tpl', 57, false),)), $this); ?>
<!doctype html> 
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="index,follow">
  <meta name="Author" content="Jakub Kułak">

  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['maindir']; ?>
/css/s.css" type="text/css">

  <title><?php echo $this->_tpl_vars['title']; ?>
</title>
  <meta name="description" content="<?php echo $this->_tpl_vars['description']; ?>
">
  <meta name="keywords" content="<?php echo $this->_tpl_vars['keywords']; ?>
">
</head>
<body>

<!-- <ul>
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
</ul> -->

<!-- <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "part-loginform.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> -->
<p class="hidden"><a href="#content" title="Pomija nawigację i nagłówek strony">Przejdź do głównej treści strony</a></p>

<div id="header">
  <h2>hhbd.pl</h2>
</div>

<div id="nav">
  <ul>
    <li><a href="/">Strona główna</a></li>
    <li><a href="/top10">Top 10</a></li>
    <li><a href="/albumy">Albumy</a></li>
    <li><a href="/zapowiedzi">Zapowiedzi</a></li>
    <li><a href="/wykonawcy">Wykonawcy</a></li>
    <li><a href="/wytwornie">Wytwórnie</a></li>
  </ul>
  <form action="/q">
    <label for="q" class="hidden">Szukaj:&nbsp;</label><input name="q" value="czego szukasz?" id="q" />
    <input type="submit" value="Szukaj &rarr;" class="button" />
  </form>
</div>
  
<?php if ($this->_tpl_vars['errmsg'] != ""): ?><div id="errmsg"><?php echo $this->_tpl_vars['errmsg']; ?>
</div><?php endif; ?>

<div id="content">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['body_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<div id="footer">
  <ul>
    <li>&copy; 2004-<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 HHBD.PL</li>
    <li><a href="/o-nas">Przeczytaj o hhbd.pl</a></li>
    <li><a href="/kontakt">Kontakt</a></li>
    <li><a href="/zasady">Zasady użytkowania</a></li>
    <li>realizacja: <a href="http://www.webascrazy.net" target="_blank">www.webascrazy.net</a></li>
  </ul>
</div>

<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  var pageTracker = _gat._getTracker("UA-3311418-1");
  pageTracker._initData();
  pageTracker._trackPageview();
</script>

</body>
</html>