<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>{$title}</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="pl" /> 

<META name="robots" content="index,follow">
<META name="description" content="{$description}">
<META name="keywords" content="{$keywords}">
<META name="Author" content="www.hhbd.pl">
<link rel="stylesheet" href="{$maindir}/css/hhbd.css" type="text/css">

</head>

<body>
<div id="container">
<div id="logo">
<div id="logomain">
<a href="/"><img src="{$maindir}/hhbdlogo.gif" border=0></a>
</div>
<div id="logostats">
<ul>
<li>postaci: {$artist_count}</li>
<li>albumów: {$album_count}</li>
<li>zapowiedzi: {$announce_count}</li>
<li>wytwórni: {$label_count}</li>
<li>newsów: {$news_count}</li>
<li>imprez: {$concert_count}</li>
<li>teledysków: {$clip_count}</li>
<li>cen albumów: {$price_count}</li>
</ul>
</div>
{include file="part-loginform.tpl"}
</div>
</div>
<div id="advtop">
<img src="/add.gif">
</div>
{if $errmsg neq ""}<div id="errmsg">{$errmsg}</div>{/if}
<div id="menu" class="menu">
<div id="menuleft">
<form method="post" action="/wyszukaj" class="s_frm">
<input type="text" name="searchstring" class="s_ed">
<input type="submit" value="SZUKAJ" class="s_btn"> 
<input type="hidden" name="type" value="{$s}">
<input type="hidden" name="urlname" value="{$urlname}">
</form>
</div>
<div id="menuright">
{if $hhbdurlname eq "fee"}<a href="/statystyki">statystyki</a> | {/if}<a href="{$maindir}/"><strong>Strona główna</strong></a> | <a href="{$maindir}/news">News</a> | <a href="{$maindir}/top10">TOP10</a><BR>
<a href="{$maindir}/albumy">Albumy</a> | <a href="{$maindir}/zapowiedzi">Zapowiedzi</a> | <a href="{$maindir}/wykonawcy">Wykonawcy</a> | <a href="{$maindir}/wytwornie">Wytwórnie</a>
</div>
</div>
<div id="main" class="main">
{if $history neq ""}
<div class="history">
{$history}
</div>
{/if}
{include file="$body_template"}
</div>
<div id="footer" class="menu">
<div id="footerleft">
<a href="{$maindir}/ohhbd">o hhbd.pl</a> | <a href="{$maindir}/kontakt">kontakt</a> | <a href="{$maindir}/zasadyuzytkowania">zasady użytkowania</a>
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