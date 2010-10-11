<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">
<div id="leftcolumn">
<div id="lsh">WSZYSTKICH</div>
<div id="lsi">{$all_count}</div>
<div id="lsh">DZISIAJ</div>
<div id="lsi">{$today_count}</div>
<div id="lsh">WCZORAJ</div>
<div id="lsi">{$yesterday_count}</div>
</div>

<div id="rightcolumn">
<div id="sectiontitle">
<div id="titleleft">
<h1 style="color: white;">{$sectiontitle}</h1>
</div>
</div>

<ul style="font-size: 9px;">
{section name=id loop=$last_clicks}
<li>{$last_clicks[id]}</li>
{/section}
</ul>

</div>
</div>


