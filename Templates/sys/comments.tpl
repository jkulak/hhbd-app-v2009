<div id="sitetitle">
<div id="titleleft">
<h1>{$ctitle}</h1>
</div>
</div>

<div id="maincontainer">
<div id="leftcolumn">
<div id="lsh">WSZYSTKICH</div>
<div id="lsi">{$totalcount}</div>
<div id="lsh">WYKONAWCOW</div>
<div id="lsi">{$ncommentcount}</div>
<div id="lsh">ALBUMOW</div>
<div id="lsi">{$acommentcount}</div>
<div id="lsh">NEWSOW</div>
<div id="lsi">{$newscommentcount}</div>
<div id="lsh">KONCERTOW</div>
<div id="lsi">{$pcommentcount}</div>



</div>

<div id="rightcolumn">


<div id="name_news_header">WYKONAWCY</div>
<div id="name_news_body" class="name_news_read">
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
</strong> ({$comments_dates_list[id]}), {$comments_aid_list[id]}
</div>
</div>
{/section}
</div>



<div id="name_news_header">ALBUMY</div>
<div id="name_news_body" class="name_news_read">
{section name=id loop=$comments_a_list}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
{$comments_a_list[id]}
</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
{if $comments_a_autor_ids_list[id] neq ""}
<a href="/u/{$comments_autor_ids_list[id]}">{$comments_a_autors_list[id]}</a>
{else if}
{$comments_a_autors_list[id]}
{/if}
</strong> ({$comments_a_dates_list[id]}), {$comments_a_aid_list[id]}
</div>
</div>
{/section}
</div>




<div id="name_news_header">NEWSY</div>
<div id="name_news_body" class="name_news_read">
{section name=id loop=$comments_news_list}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
{$comments_news_list[id]}
</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
{if $comments_news_autor_ids_list[id] neq ""}
<a href="/u/{$comments_autor_ids_list[id]}">{$comments_news_autors_list[id]}</a>
{else if}
{$comments_news_autors_list[id]}
{/if}
</strong> ({$comments_news_dates_list[id]}), {$comments_news_aid_list[id]}
</div>
</div>
{/section}
</div>



<div id="name_news_header">KONCERTY</div>
<div id="name_news_body" class="name_news_read">
{section name=id loop=$comments_p_list}
<div id="commentbox">
<div id="commentbox_sep"></div>
<div id="commentbox_body">
{$comments_p_list[id]}
</div>
<div id="commentbox_sig" class="sig">
dodany: <strong>
{if $comments_p_autor_ids_list[id] neq ""}
<a href="/u/{$comments_autor_ids_list[id]}">{$comments_p_autors_list[id]}</a>
{else if}
{$comments_p_autors_list[id]}
{/if}
</strong> ({$comments_p_dates_list[id]}), {$comments_p_aid_list[id]}
</div>
</div>
{/section}
</div>




</div>
</div>


