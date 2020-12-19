<?php
session_start();

if(isset($_SESSION['donwload']) and isset($_SESSION['extenção'])):
	unset($_SESSION['donwload']);
	unset($_SESSION['extenção']);
endif;


$formatosPermitidos = array("txt", "py", "jar", "php","html","css","js","cep");
$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
if(in_array($extensao, $formatosPermitidos)):
	$pasta = "../Arquivos/";
	$temporario = $_FILES['arquivo']['tmp_name'];
	$novoNome = uniqid().".$extensao";
	if(move_uploaded_file($temporario, $pasta.$novoNome)):
        $_SESSION['Earquivo'] = $novoNome;
        $_SESSION['Eextensao'] = $extensao;
    else:
        echo "Erro ao enviar o arquivo. <br/>";                        
    endif;
else:
    echo "A extensão $extensao não é permitida. <br/>";                    
endif;

header('location: ../index.php');