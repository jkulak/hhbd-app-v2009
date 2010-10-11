<div id="sitetitle">
<div id="titleleft">
<h1>{$listname}</h1>
</div>
</div>

<div id="letterswitch" class="letterswitch">
{$namesletters}
</div>

<ul class="listanumerowana">
{foreach from=$nameslist item=curr}
  <li class="itemnumerowany">{$curr}</li>
{/foreach}
</ul>

<div id="letterswitch" class="letterswitch">
{$namesletters}
</div>