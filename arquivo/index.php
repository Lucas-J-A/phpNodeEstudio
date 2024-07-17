<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>01-fundamentos basicso </title>
</head>
<body>

	<?php
	// esse é o meu primeiro arquivo php
	/*
	Comentario varias linhas
	*/
	//variaveis 

	// var_dump($var) = mostra informção sobre variavel

	/* constante em array
define('ANIMALS', array(
    'dog',
    'cat',
    'bird'
));
echo ANIMALS[1]; // imprime "cat"
*/

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1]; // imprime "cat"
echo "<hr>";


	  $a = 1; 
	  $b = 5; 
	  $c = 10;
	$nome= "Lucas José";
	$idade = 22;
	$altura = 1.79;
	echo "Meu nome é $nome, minha idade é $idade e minha altura é $altura";
	echo "<br> <hr>";

	//object
	class Cliente {
		public $nome;
		public function atribuirNome($nome){
			$this-> $nome = $nome;

		}
	}
	$Cliente = new Cliente();
	$Cliente->atribuirNome("Lucas");
	var_dump($Cliente);
	echo "<br>";
	if (is_object($Cliente)):
		echo "È um objeto";
		else: echo "Não e um objeto";
		endif;
		echo "<hr>";

		$name = "Lucas José";
		echo 'meu nome é '.$name.' Minha idade é \'22\'';

		$nome = "Lucas José";
		function exibeNome(){
			global $nome;
			echo $nome;
		}
		exibeNome();
		echo "<hr>";

		function exibeCidade(){
			global $cidade;
			$cidade= "sp";
		}

		exibeCidade();
		echo $cidade;
		echo("<hr>");
     

       function soma(){
       	echo $GLOBALS['a'] +
       	     $GLOBALS['b']+ 
       	     $GLOBALS['c'];
       }
       soma();
       echo "<hr>";

define ("NOME", "Lucas José");
echo 'Meu nome é '.NOME;
echo "<hr>";

$carros =['carro1','carro2','carro3'];
//$carros[5] = 'carro4';

print_r($carros);
echo "<br><hr>";
echo count($carros);

foreach ($carros as $key => $value) {
	//key é a chave numero que se entra no array
	// value e o valor que se econtra no array
	echo "<br> $value";
}

echo("<hr>");

$pessoa = array("nome"=>"Lucas", "idade"=> 22);
echo $pessoa["nome"];
$pessoa["cidade"]="sp";

foreach ($pessoa as $key => $value) {
	echo $key.":". $value."<br>";
}
echo "<hr>";
// Array Multidmensionais
$times=array(
	"cariocas"=>array(
		"campeao"=>"vasco", 
		"vice"=>"flamengon",
		"terceiro"=>"botafogo"),
	"paulista"=>array("santos", "sao paulo", "palmeiras"),
	"baianos"=>array("bahia","vitoria","itabuna")
            );
echo $times["paulista"][0];
echo "<br><hr>";

foreach ($times["cariocas"] as $key => $value) {
	echo $key. " : ".$value."<br>";
}
$str = 'one|two|three|four';

// explode — Divide uma string em strings
print_r(explode('|', $str));
//implode — Junta elementos de uma matriz em uma string
echo "<br>";

$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

print $comma_separated;


echo "<br><hr>";
//operador ternario
$media = 6;
echo ($media>=6)?"aprovado":"reprovado";
echo "<br><hr>";
//switch
$i=2;
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}echo "<br><hr>";


	
	?>
<?php
	if(isset($_POST['enviar-formulario'])):
		$erros = array();
		//validação
		/*
		if (!$idade =filter_input(INPUT_POST, 'idade',FILTER_VALIDATE_INT)):
			$erros[]= "Idade precisa ser um inteiro";
		endif;
		if (!$email =filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL)):
			$erros[]= "Email invalido";
		endif;
		if (!$peso =filter_input(INPUT_POST, 'peso',FILTER_VALIDATE_FLOAT)):
			$erros[]= "Peso precisa ser um float";
		endif;
		if (!$ip =filter_input(INPUT_POST, 'ip',FILTER_VALIDATE_IP)):
			$erros[]= "Ip Invalido";
		endif;
		if (!$url =filter_input(INPUT_POST, 'url',FILTER_VALIDATE_URL)):
			$erros[]= "URL invalido";
		endif;
		*/
		// Sanitize
		$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
		//filter serve para escapa todas tag html
		echo $nome;
//exibindo erros

		 if (!empty($erros)):
		 	foreach ($erros as $key => $value) :
		 		echo "<li> $value </li>";
		 	endforeach;
		 	else: 
		 		echo "Parabéns seus dados estão corretos";
		 endif;
	endif;

	
//session
session_start();
$_SESSION['cor']="Verde";
$_SESSION['carro']="Veloster";
echo $_SESSION['cor']."<br>". $_SESSION['carro'];
//*******Criptografia**************
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
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
		Nome:<input type="text" name="nome"><br>
		Idade:<input type="text" name="idade"><br>
		Email:<input type="text" name="email"><br>
		<!-- Peso:<input type="text" name="peso"><br> -->
		<!-- ip:<input type="text" name="ip"><br> -->
		URL:<input type="text" name="url"><br>
	<button type="submit" name="enviar-formulario">Enviar</button><br>
		

	</form>
<!--aspa simples não e intreprertato tudo que tiver dentro  vai ser string.--> 


</body>
</html>