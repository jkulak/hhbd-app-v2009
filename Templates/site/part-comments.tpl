{if $add eq "komentarze"}
{section name=id loop=$comments_list}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
{$comments_list[id]}
</div>
<div id="commentbox_sig" class="sig">

dodany: <strong>
{if $comments_autor_ids_list[id] neq ""}
<a href="/u/{$comments_autor_ids_list[id]}">{$comments_autors_list[id]}</a>
{else if}
{$comments_autors_list[id]}
{/if}

</strong> ({$comments_dates_list[id]})

</div>
</div>
{/section}

<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
<form method="post" action="/add-comment.php" style="margin-bottom: 4px;">
<input type="hidden" name="id" value="{$id}">
<input type="hidden" name="type" value="{$s}">
<input type="hidden" name="urlname" value="{$urlname}">
<textarea name="comment" lines="10" class="commentta"></textarea>
<div style="float: left;">
{if $hhbdlogin neq ""}
<input type="hidden" name="addedby" value="{$hhbdlogin}">
<input type="hidden" name="addedbyurlname" value="{$hhbdurlname}">
{else}
<strong>PODPIS:</strong><input type="text" name="addedby" class="commentinput">
{/if}
</div>
<div style="float: right;"><input type="submit" value="DODAJ" class="commentit"></div>
</form>
<div id="commentbox_sig" style="clear: both;" class="sig">

</div>
</div>
</div>
{/if}