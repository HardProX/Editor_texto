<?php
session_start();

if(isset($_SESSION['donwload']) and isset($_SESSION['extenção'])):
	unset($_SESSION['donwload']);
	unset($_SESSION['extenção']);
endif;

if(isset($_SESSION['Earquivo']) and isset($_SESSION['Eextensao'])):
	unset($_SESSION['Earquivo']);
	unset($_SESSION['Eextensao']);
endif;

$_SESSION['background'] = "padrão";
header('location: ../index.php');