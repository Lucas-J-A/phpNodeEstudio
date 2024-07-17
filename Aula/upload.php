<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>01-fundamentos basicso </title>
</head>
<body>

<?php
//upload de imagem
/*
if(isset($_POST['enviar-formulario'])):
$formatosPermitos = array("png","jpeg","jpg","gif");
$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
if (in_array($extensao, $formatosPermitos)) {
	$pasta ="arquivo/";
	$temporario=$_FILES['arquivo']['tmp_name'];
	$novoNome = uniqid().".$extensao";

	if (move_uploaded_file($temporario, $pasta.$novoNome)) {
		$mensagem ="Upload feito com sucesso";
	}else{
		$mensagem = "Erro, não foi possivel fazer upload";
	}
}else
  $mensagem ="Formato invalido";

  echo $mensagem;
endif;
*/

//multiplos arquivo---------------------------
if(isset($_POST['enviar-formulario'])){
$formatosPermitos = array("png","jpeg","jpg","gif");
$quantidadeArquivos =count($_FILES['arquivo']['name']);
$contador = 0;


while ($contador < $quantidadeArquivos) {
	$extensao = pathinfo($_FILES['arquivo']['name'][$contador], PATHINFO_EXTENSION);
if (in_array($extensao, $formatosPermitos)) {
	$pasta ="arquivo/";
	$temporario=$_FILES['arquivo']['tmp_name'][$contador];
	$novoNome = uniqid().".$extensao";

	if (move_uploaded_file($temporario, $pasta.$novoNome)) {
		echo "upload feito com sucesso para $pasta$novoNome<br>";
	}else{
		echo "Erro ao enviar o arquivo $temporario";
	}
}else
	echo " $extensao não e permitdo";

	$contador++;

}
}





?>
	<!-- formulario para upload uma imagem

	<form action="<?//php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="arquivo"><br>
	<button type="submit" name="enviar-formulario">Enviar</button><br>
		

	</form> -->
 
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
	<input type="file" name="arquivo[]" multiple=""><br>
	<button type="submit" name="enviar-formulario">Enviar</button><br>
		

	</form> 

</body>
</html>