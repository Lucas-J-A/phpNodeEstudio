<?php 
//Criptografia
$senha ="123456";
//base64  mão dupla 

$novasenha =base64_encode($senha);//encode codifica
echo "base64 ".$novasenha."<br>";
echo "Sua senha é :".base64_decode($novasenha);//decode decodifica


echo "<hr>";

//md5
echo "MD5".MD5($senha)."<br>";
//Sha1
echo "Sha1".Sha1($senha)."<br>";

// $options = [
// 	//cost custo
//  'cost' =>10,
// ];
//criptografia segura com password Hash
$senha_db ='$2y$10$Y1b4KPhdq1PvHYGJg7tR3.K9Vx6BdFUVTkt088Kf3H7xjj2vMgSNG';
$senhaSegura = 
password_hash($senha, PASSWORD_DEFAULT/*,$options*/);
echo $senhaSegura;
//verificação do password hash
if(password_verify($senha, $senha_db)){
	echo "<br>Senha válida";
}else{
	echo "<br>Senha invalida";
}
?>