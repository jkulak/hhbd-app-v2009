<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="main_container">
<strong>UŻYTKOWNICY, KTÓRZY MAJĄ TEN ALBUM W SWOJEJ CHCĘLIŚCIE:</strong>
<p>
<ul class="listanumerowana">
{section name=id loop=$users}
<li class="itemnumerowany">{$users[id]}</li>
{/section}
</ul>
</p>

</div>