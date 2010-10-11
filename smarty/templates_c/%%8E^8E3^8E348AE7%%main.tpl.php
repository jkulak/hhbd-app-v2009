<?php /* Smarty version 2.6.9, created on 2010-10-10 16:58:26
         compiled from site/main.tpl */ ?>
<div id="latest">
  <h1>Ostatnio wydane albumy</h1>
  <ul class="elemlist">
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
    <li class="elem">
      <a class="cover" href="/a/<?php echo $this->_tpl_vars['ownalbum_ids_list'][$this->_sections['id']['index']]; ?>
">
        <img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['ownalbum_covers_list'][$this->_sections['id']['index']]; ?>
" alt="Okładka <?php echo $this->_tpl_vars['ownalbums_names'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['ownalbums_titles'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['ownalbums_names'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['ownalbums_titles'][$this->_sections['id']['index']]; ?>
"/>
        <span></span>
      </a>
      <ul class="info">
        <li><?php echo $this->_tpl_vars['ownalbum_artists_list'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['ownalbum_titles_list'][$this->_sections['id']['index']]; ?>
</li>
        <li>Wytwórnia: <?php echo $this->_tpl_vars['ownalbum_labels_list'][$this->_sections['id']['index']]; ?>
</li>
        <li>Data wydania: <?php echo $this->_tpl_vars['ownalbum_years_list'][$this->_sections['id']['index']]; ?>
</li>
      </ul>
    </li>
  <?php endfor; endif; ?>
  </ul>
  <a href="/albumy">Pokaż wszystkie albumy</a>
</div>

<div id="premieres">
  <h1>Zapowiedziane premiery</h1>
  <ul class="elemlist">
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
    <li class="elem">
      <a class="cover" href="/a/<?php echo $this->_tpl_vars['album_ids_list'][$this->_sections['id']['index']]; ?>
">
        <img src="/imgs/database/albums-thumbs/<?php echo $this->_tpl_vars['album_covers_list'][$this->_sections['id']['index']]; ?>
" alt="Okładka <?php echo $this->_tpl_vars['albums_names'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['albums_titles'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['albums_names'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['albums_titles'][$this->_sections['id']['index']]; ?>
"/>
        <span></span>
      </a>
      <ul class="info">
        <li><?php echo $this->_tpl_vars['album_artists_list'][$this->_sections['id']['index']]; ?>
 - <?php echo $this->_tpl_vars['album_titles_list'][$this->_sections['id']['index']]; ?>
</li>
        <li>Wytwórnia: <?php echo $this->_tpl_vars['album_labels_list'][$this->_sections['id']['index']]; ?>
</li>
        <li>Data wydania: <?php echo $this->_tpl_vars['album_years_list'][$this->_sections['id']['index']]; ?>
</li>
      </ul>
    </li>
  <?php endfor; endif; ?>
  </ul>
  <a href="/zapowiedzi">Pokaż wszystkie zapowiedzi</a>
</div>

<div id="intro">
<h1>Polski hip-hop w pigułce</h1>
Witamy na stronie o polskim hip-hopie! Piąty element, wiedza. U nas znajdziesz wszystko czego szukasz o polskim hip-hopie. Recenzje, traklisty albumów, informacje o premierach, profile wykonawców, listy wydanych płyt przez poszczególne wytwórnie, aktualne newsy, teksty piosenek i wiele innych. Zarejestruj się, będziesz miał dostęp do wielu dodatkowych opcji oraz możliwość brania udziału w konkursach!
</div>