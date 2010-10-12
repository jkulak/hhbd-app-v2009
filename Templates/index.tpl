<!doctype html> 
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="index,follow">
  <meta name="Author" content="Jakub Kułak">

  <link rel="stylesheet" href="{$maindir}/css/s.css" type="text/css">

  <title>Hhbd.pl - {$title} - Polski hip-hop</title>
  <meta name="description" content="{$description}">
  <meta name="keywords" content="{$keywords}, hhbd.pl, polski hip-hop, hip hop, płyty">
</head>
<body>

<!-- <ul>
<li>postaci: {$artist_count}</li>
<li>albumów: {$album_count}</li>
<li>zapowiedzi: {$announce_count}</li>
<li>wytwórni: {$label_count}</li>
<li>newsów: {$news_count}</li>
<li>imprez: {$concert_count}</li>
<li>teledysków: {$clip_count}</li>
<li>cen albumów: {$price_count}</li>
</ul> -->

<!-- {include file="part-loginform.tpl"} -->
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
  
{if $errmsg neq ""}<div id="errmsg">{$errmsg}</div>{/if}

<div id="content">
  {include file="$body_template"}
</div>

<div id="footer">
  <ul>
    <li>&copy; 2004-{$smarty.now|date_format:"%Y"} HHBD.PL</li>
    <li><a href="/o-nas">O nas</a></li>
    <li><a href="/blog">Blog</a></li>
    <li><a href="/kontakt">Kontakt</a></li>
    <li><a href="/zasady">Zasady użytkowania</a></li>
    <li><a href="/mapa-strony">Mapa strony</a></li>
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