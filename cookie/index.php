<?php 
//cookie
setcookie('user', 'Lucas José', time()+3600);
setcookie('email', 'Lucas@email.com', time()+3600);
setcookie('ultima_pesquisa', 'tenis adidas', time()+3600);
echo $_COOKIE['user'];
//var_dump($_COOKIE);
?>