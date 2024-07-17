<?php
//Encerrando sessão
session_start();
session_unset();
session_destroy();
//redireciona para pagina
header('Location: index.php');
?>