<?php
session_start();

if(isset($_SESSION['Earquivo']) and isset($_SESSION['Eextensao'])):
	unset($_SESSION['Earquivo']);
	unset($_SESSION['Eextensao']);
endif;



$texto = $_POST['texto'];
$extenção = $_POST['extenção'];

function nomeA($nome){
	$letrasM = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t"
,"u","v","w","x","y","z");

	for($p=0; $p <= 10; $p++):
		$numA = random_int(0, 25);
		$nome .= "".$letrasM[$numA];
	endfor;

	return $nome;
}

$nomeArquivo = nomeA("arquivo").$extenção;

$arquivo = fopen("../Arquivos/".$nomeArquivo, "w");
fwrite($arquivo, $texto."\n");
fclose($arquivo);

$_SESSION['donwload'] = $nomeArquivo;
$_SESSION['extenção'] = $extenção;

header('location: ../index.php');