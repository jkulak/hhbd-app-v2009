<div id="maincontainer">

	<div class="m_l">
		<div class="m_ln">
			<div class="m_lh">NEWSY</div>
				{section name=id loop=$news_dates_list}
				<a href="/news/{$news_ids_list[id]}"><img src="/imgs/layout/hiphop.gif"  align="bottom" border="0"><h3>{$news_titles_list[id]}</h3></a>
				<div id="newssign">{$news_dates_list[id]}</div>
				<div style="text-align: justify; font-size: 9px;">{$news_list[id]}</div>
				<div class="m_hr"></div>
				{/section}
				<div class="m_rf" style="background-color: #eeeea0;"><a href="/news">pokaż wszystkie</a></div>
			</div>
		</div>

	<div class="m_r">
		<div class="m_rl">
			<div class="m_rbox">
				<div class="m_rh">OSTATNIO WYDANE</div>
				{section name=id loop=$ownalbum_ids_list}
					<div class="m_rac">
						<div id="name_album_thumb">
							<a href="/a/{$ownalbum_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$ownalbum_covers_list[id]}" border="0"></a>
						</div>
						<div class="m_rai">
							<ul>
							<li>{$ownalbum_artists_list[id]}</li>
							<li>"{$ownalbum_titles_list[id]}"</li>
							<li>{$ownalbum_labels_list[id]}</li>
							<li>{$ownalbum_years_list[id]}</li>
							</ul>
						</div>
					</div>
				{/section}
				<div class="m_rf"><a href="/albumy">pokaż wszystkie</a></div>
			</div>


			<div class="m_rbox">
			
				<div  style="text-align: justify;">
					Witamy na stronie o polskim hip-hopie! Piąty element, wiedza. U nas znajdziesz wszystko czego szukasz o polskim hip-hopie. Recenzje, <a href="/albumy">traklisty albumów</a>, <a href="/zapowiedzi">informacje o premierach</a>, <a href="/wykonawcy">profile wykonawców</a>, <a href="/wytwornie">listy wydanych płyt przez poszczególne wytwórnie</a>, <a href="/news">aktualne newsy</a>, <a href="/imprezy">zapowiedzi koncertów</a>, teksty piosenek i wiele innych. <a href="/nowekonto">Zarejestruj się</a>, będziesz miał dostęp do wielu dodatkowych opcji oraz możliwość brania udziału w konkursach!
				</div>
			</div>
		</div> <!-- m_rl -->

		
		
		<div class="m_rr">
<div class="m_rbox">
<div class="m_rh">NAJBLIŻSZE PREMIERY</div>
                {section name=id loop=$album_ids_list}
                    <div class="m_rac">
                        <div id="name_album_thumb">
                            <a href="/a/{$album_ids_list[id]}"><img src="/imgs/database/albums-thumbs/{$album_covers_list[id]}" border="0"></a>
                        </div>
                        <div class="m_rai">
                            <ul>
                            <li>{$album_artists_list[id]}</li>
                            <li>"{$album_titles_list[id]}"</li>
                            <li>{$album_labels_list[id]}</li>
                            <li>{$album_years_list[id]}</li>
                            </ul>
                        </div>
                    </div>
                {/section}
                <div class="m_rf"><a href="/zapowiedzi">pokaż wszystkie</a></div>
</div>

		</div> <!-- m_rr -->
		
	</div> <!-- m_r -->
	
</div> <!-- maincontainer -->

