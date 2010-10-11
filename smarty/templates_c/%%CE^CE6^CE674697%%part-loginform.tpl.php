<?php /* Smarty version 2.6.9, created on 2010-10-10 11:22:49
         compiled from part-loginform.tpl */ ?>
<div id="loginform" class="main">
<?php if ($this->_tpl_vars['hhbdlogin'] != ""): ?>

zalogowany: <?php echo $this->_tpl_vars['hhbdlogin']; ?>
<br>
[<a href="/mojprofil">pokaż profil</a>]
[<a href="/logout">wyloguj</a>]

<?php else: ?>

<form method="post" action="/login">
Login: [<a href="/nowekonto">załóż konto</a>]<br>
<input type="text" name="login" class="loginform" value="<?php echo $this->_tpl_vars['loginname']; ?>
"><br>
Hasło: [<a href="/zapomnianehaslo">zapomniane hasło</a>]<br>
<input type="password" name="pass" class="loginform"><BR>
<input type="submit" value="ZALOGUJ" style="margin-top: 4px; font-size: 10px; height: 20px; width: 150px; background-color: #FFFFBB;">


<?php endif; ?>

</form>