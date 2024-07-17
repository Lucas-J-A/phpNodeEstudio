<?php
//Conexao com banco de dados
$servername="localhost";
$username ="root";
$password ="";
$db_name="crud";

//conexao com banco de dados
$connect = mysqli_connect($servername,$username,$password,$db_name);
mysqli_set_charset($connect, "utf8");

//se houver erro 
if (mysqli_connect_error()) {
	echo "Falha na conexao".mysqli_connect_error();
}

?>