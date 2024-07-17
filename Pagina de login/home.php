<?php
require_once 'db_connect.php';
//sessao
session_start();

//verificação
if (!isset($_SESSION['logado'])) {
	header('Location: index.php');
}
//dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
//fechat conexao
mysqli_close($connect);
?>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Página restrita </title>
</head>
<body>
<h1> Olá <?php echo $dados['nome'] ;?></h1>

<a href="logout.php">sair</a>

</body>
</html>