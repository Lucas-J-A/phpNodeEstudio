<?php 
//Conexão
require_once 'db_connect.php';
//sessao
session_start();
//Botão enviar
if(isset($_POST['btn-entrar'])){
	$erros = array();
	//tranforma em string para o banco
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if (empty($login) or empty($senha)) {
		$erros []="<li> O campo login/senha precisa ser preenchido</li>";

	}

	 	else{
	 		//seleciona da login da tabela usuarios onde login e = a login
	$sql = "SELECT login FROM usuarios WHERE login = '$login'";
	 		$resultado = mysqli_query($connect, $sql);

	 		//se houver algum registro no banco
	 		if (mysqli_num_rows($resultado) > 0) {
	 			$senha = md5($senha);
	 			$sql ="SELECT * FROM usuarios WHERE login= '$login' AND senha = '$senha'";
	 		//	A função mysqli_query () executa uma consulta na base de dados.
	 			$resultado = mysqli_query($connect, $sql);
	 			if (mysqli_num_rows($resultado) == 1) {
	 				//converte resultado em um array
	 				$dados = mysqli_fetch_array($resultado);
	 				mysqli_close($connect);
	 				$_SESSION['logado'] = true;
	 				$_SESSION['id_usuario'] = $dados['id'];
	 				header('Location: home.php');
	 				
	 			}else{$erros[]="<li>Usuario e senha não conferem</li>";}
	 		}
	 		else{
	 			$erros[] = "<li> Usuario inexistente</li>";
	 	        }
	        }
}
	
	?>

	<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Index </title>
</head>
<body>
<h1>Login</h1><hr>
<?php 
//mensagem erros
	if (!empty($erros)) {
	 	foreach ($erros as $key => $value) {
	 		echo $value;
	 	}
	 }
?>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
		Login: <input type="text" name="login"><br>
		Senha:<input type="password" name="senha"><br>
		<button type="submit" name="btn-entrar">Entrar</button>
	</form>



</body>
</html>