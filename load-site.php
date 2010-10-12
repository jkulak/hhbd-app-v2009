<?php

$s_arr = array( 'glowna' => 'site/main',
				'wykonawca' => 'site/name',
				'n' => 'site/name',
				
				'wykonawcy' => 'site/names',
				
				'wytwornia' => 'site/label',
				'l' => 'site/label',
				
				'wytwornie' => 'site/labels',
				
				's' => 'site/song', 
				
				'impreza' => 'site/concert',
				'p' => 'site/concert',
				
				'imprezy' => 'site/concerts',
				'mojprofil' => 'user/myprofile',
				'logout' => 'user/logout',
				'login' => 'user/login',
				'nowekonto' => 'user/new-account-form',
				'newaccount' => 'user/new-account',
				'aktywuj' => 'user/activate-account',
				'zapomnianehaslo' => 'user/lost-password',
				'remindpass' => 'user/remind-pass',
				'updateusersettings' => 'user/update-user-settings',
				'chcelista' => 'site/wishlist',
				'kolekcja' => 'site/collection',
				'blad' => 'site/submit-error-form',
				'submiterror' => 'site/submit-error',
				'polec' => 'site/recommend-site-form',
				'recommendsite' => 'site/recommend-site',
				'u' => 'user/show-user',
				'album' => 'site/album',
				
				'a' => 'site/album',
				
				'chcedodaj' => 'user/wishlist-add',
				'chceusun' => 'user/wishlist-remove',
				'koldodaj' => 'user/collection-add',
				'kolusun' => 'user/collection-remove',
				'ocenalbum' => 'user/album-rate',
				'anulujocene' => 'user/album-unrate',
				'lalalab' => 'site/go-lalalab',
				'kupalbum' => 'site/go-buyalbum',
				
				'zapowiedzi' => 'site/announces',
				'albumy' => 'site/albums',
				'news' => 'site/news',
				
				'statystyki' => 'sys/stats',
				'komentarze' => 'sys/comments',
				
				
				
				'zasadyuzytkowania' => 'site/rules',
				'ohhbd' => 'site/about',
				'kontakt' => 'site/contact',
				'wyszukaj' => 'site/search',
				'top10' => 'site/top10',
				
				'dodajsampel' => 'site/add-sample-form',
				'addsample' => 'site/add-sample',
				
				'promomix' => 'site/get-promomix',
				'stronawytworni' => 'site/go-labelsite',
				'stronakoncertu' => 'site/go-concertsite',
				'stronawykonawcy' => 'site/go-namesite',
				
				'mapa-strony' => 'site/Sitemap'
				);
				

if (($s == '')) $s = 'glowna';

// if $s jest ktoryms ktorych trzeba szukac to search
// else podstawiamy stalego HTML
// a co z lista albumow, bo z TOP 10

if (isset($s_arr[$s])) {
	if (file_exists($s_arr[$s] . '.php')) {
		include ($s_arr[$s] . '.php');
		}
	else {
		$smarty->assign('errmsg', 'Brak pliku: "<i>' . $s_arr[$s] . '.php</i>"');
		// tutaj mozna dac template wyswietlajacy blad a nie MAIN
		$smarty->assign('body_template', 'site/main.tpl');
		}	
	}
else include ('security/hackme.php');

?>