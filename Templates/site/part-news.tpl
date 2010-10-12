{if $add eq "newsy"}
{section name=news loop=$news_ids_list}
<div id="name_news_header">
{$news_titles_list[news]}
</div>
<div id="name_news_header_left">
{$news_added_list[news]}
</div>
<div id="name_news_body" class="name_news_read">{$news_list[news]} <a href="/news/{$news_ids_list[news]}" class="readmore">>></a></a></div>

{/section}

{/if}