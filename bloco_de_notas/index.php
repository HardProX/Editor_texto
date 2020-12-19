<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Edito de codigo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">

		<?php 
			if($_SESSION['background'] == "padrão"){
		?>
		body{
			background-color: #222222;
		}

		#menu{
			background-color: #191919;
		}

		#Editor{
			background-color: #181818;
		}

		#Editor form input[type="file"]{
			color: #fff;
		}

		#Editor form textarea{
			color: black;
			background-color: #fff;
		}

		#Editor form input[type="text"]{
			color: black;
			background-color: #fff;
		}

		#Editor form input[type="submit"]{
			background-color: #202020;
			color: #fff;
		}

		#Editor form input[type="submit"]:hover {
			background-color: #f5f5f5;
			color: black;
		}

		<?php
			}else if($_SESSION['background'] == "branco"){
		?>
		body{
			background-color: #f5f5f5;
		}

		#menu{
			background-color: #D3D3D3;
		}

		#menu li a:hover{
			color: black;
		}

		#Editor{
			background-color: #DCDCDC;
		}

		#Editor form input[type="file"]{
			color: black;
		}

		#Editor form textarea{
			color: #fff;
			background-color: black;
		}
		#Editor form input[type="text"]{
			color: #fff;
			background-color: black;
		}

		#Editor form input[type="submit"]{
			background-color: #f5f5f5;
			color: black;
		}

		#Editor form input[type="submit"]:hover {
			background-color: #202020;
			color: #fff;
		}

		<?php
			}
		?>
	</style>
</head>
<body>


	<div id="container">
		<div id="menu">
			<ul>
				<li><a href="actions/Tpadrão.php">Tema Padrão</a></li>
				<li><a href="actions/Tbranco.php">Tema Branco</a></li>
				<?php
				if(isset($_SESSION['donwload'])){
				?>
					<li><a href="Arquivos/<?php echo $_SESSION['donwload']; ?>" download="<?php echo $_SESSION['donwload'] ?>" type="application/<?php echo $_SESSION['extenção']; ?>" >Download do Arquivo</a></li>
				<?php
					}
				?>
			</ul>
			<div style="clear: both;"></div>
		</div>

		<div id="Editor" style="clear: both;">

			<form method="POST" action="actions/editar.php" enctype="multipart/form-data">
				<input type="file" name="arquivo" required>
				<input type="submit" name="btn-editar" value="Editar Arquivo">
			</form>
			
			<form method="POST" action="actions/salvar.php">
				<?php 
				if(isset($_SESSION['Earquivo'])){
				$dados = file("Arquivos/".$_SESSION['Earquivo']);
				$extensao = $_SESSION['Eextensao'];
				?>
				<textarea name="texto" placeholder="Digite seu Codigo" required><?php foreach ($dados as $key => $value) { echo $value; }?>	
				</textarea>
				<input type="text" name="extenção" placeholder="Digite a extenção do arquivo, exp= '.txt' " required value=".<?php echo $extensao; ?>">
				<?php
					}else{
				?>
					<textarea name="texto" placeholder="Digite seu Codigo" required></textarea>
					<input type="text" name="extenção" placeholder="Digite a extenção do arquivo, exp= '.txt' " required>
				<?php
					}
				?>
				<input type="submit" name="btn-salvar" value="Salvar">
			</form>

		</div>

	</div>



</body>
</html>
