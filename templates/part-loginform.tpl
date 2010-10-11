<div id="loginform" class="main">
{if $hhbdlogin neq ""}

zalogowany: {$hhbdlogin}<br>
[<a href="/mojprofil">pokaż profil</a>]
[<a href="/logout">wyloguj</a>]

{else if}

<form method="post" action="/login">
Login: [<a href="/nowekonto">załóż konto</a>]<br>
<input type="text" name="login" class="loginform" value="{$loginname}"><br>
Hasło: [<a href="/zapomnianehaslo">zapomniane hasło</a>]<br>
<input type="password" name="pass" class="loginform"><BR>
<input type="submit" value="ZALOGUJ" style="margin-top: 4px; font-size: 10px; height: 20px; width: 150px; background-color: #FFFFBB;">


{/if}

</form>