<h1>Login leht</h1>
<a href="http://valgahaiglacatering.rf.gd/">Esileht</a>
<a href="http://valgahaiglacatering.rf.gd/index.php/register">Regamine</a>

<!-- LOGIN FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/login/start">

 
<label for="username">Kasutajanimi: </label>
<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />

<label for="password">Parool: </label>
<input type="password" id="password" name="password" />

<button type="submit">Logi sisse</button>

</form>

<!-- LOGIN FORM END -->