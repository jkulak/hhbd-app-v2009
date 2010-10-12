<div id="sitetitle" {if $infotype eq "error"} style="background-color: red;"{/if} {if $infotype eq "ok"} style="background-color: green;"{/if}>
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">
{$info}
</div>