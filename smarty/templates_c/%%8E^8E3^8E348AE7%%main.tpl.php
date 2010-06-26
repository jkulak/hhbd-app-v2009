<?php /* Smarty version 2.6.9, created on 2008-11-23 14:41:46
         compiled from site/main.tpl */ ?>
<div id="maincontainer">

	<div class="m_l">
		<div class="m_ln">
			<div class="m_lh">NEWSY</div>
				<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['news_dates_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
				<a href="/news/<?php echo $this->_tpl_vars['news_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/layout/hiphop.gif"  align="bottom" border="0"><h3><?php echo $this->_tpl_vars['news_titles_list'][$this->_sections['id']['index']]; ?>
</h3></a>
				<div id="newssign"><?php echo $this->_tpl_vars['news_dates_list'][$this->_sections['id']['index']]; ?>
</div>
				<div style="text-align: justify; font-size: 9px;"><?php echo $this->_tpl_vars['news_list'][$this->_sections['id']['index']]; ?>
</div>
				<div class="m_hr"></div>
				<?php endfor; endif; ?>
				<div class="m_rf" style="background-color: #eeeea0;"><a href="/news">pokaż wszystkie</a></div>
			</div>
		</div>

	<div class="m_r">
		<div class="m_rl">
			<div class="m_rbox">
				<div class="m_rh">OSTATNIO WYDANE</div>
				<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['ownalbum_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
					<div class="m_rac">
						<div id="name_album_thumb">
							<a href="/a/<?php echo $this->_tpl_vars['ownalbum_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['ownalbum_covers_list'][$this->_sections['id']['index']]; ?>
" border="0"></a>
						</div>
						<div class="m_rai">
							<ul>
							<li><?php echo $this->_tpl_vars['ownalbum_artists_list'][$this->_sections['id']['index']]; ?>
</li>
							<li>"<?php echo $this->_tpl_vars['ownalbum_titles_list'][$this->_sections['id']['index']]; ?>
"</li>
							<li><?php echo $this->_tpl_vars['ownalbum_labels_list'][$this->_sections['id']['index']]; ?>
</li>
							<li><?php echo $this->_tpl_vars['ownalbum_years_list'][$this->_sections['id']['index']]; ?>
</li>
							</ul>
						</div>
					</div>
				<?php endfor; endif; ?>
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
                <?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['album_ids_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
                    <div class="m_rac">
                        <div id="name_album_thumb">
                            <a href="/a/<?php echo $this->_tpl_vars['album_ids_list'][$this->_sections['id']['index']]; ?>
"><img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['album_covers_list'][$this->_sections['id']['index']]; ?>
" border="0"></a>
                        </div>
                        <div class="m_rai">
                            <ul>
                            <li><?php echo $this->_tpl_vars['album_artists_list'][$this->_sections['id']['index']]; ?>
</li>
                            <li>"<?php echo $this->_tpl_vars['album_titles_list'][$this->_sections['id']['index']]; ?>
"</li>
                            <li><?php echo $this->_tpl_vars['album_labels_list'][$this->_sections['id']['index']]; ?>
</li>
                            <li><?php echo $this->_tpl_vars['album_years_list'][$this->_sections['id']['index']]; ?>
</li>
                            </ul>
                        </div>
                    </div>
                <?php endfor; endif; ?>
                <div class="m_rf"><a href="/zapowiedzi">pokaż wszystkie</a></div>
</div>

		</div> <!-- m_rr -->
		
	</div> <!-- m_r -->
	
</div> <!-- maincontainer -->
