<?php require_once ("includes/config.php"); ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="vista/css/common.css">
    <meta charset="utf-8">
<head>
	<title>TodoPerros</title>
</head>
<body>
  		<?php require ("vista/common/header.php")?>
	<div id="container">
		<div class="row">
			<div class="titulo">
				<img id="logo_inicio" src="img/vubosin.jpg">
			</div>

			<?php
			if(isset($_SESSION['login'])){
				if($_SESSION['login']){
          if (isset($_SESSION['id_usuario'])) {
  					$id = $_SESSION['id_usuario'];
  				}else{
  					$id = $_SESSION['id_empresa'];
  				}
				echo "Bienvenido,  " . $_SESSION['nombre'];
				}
			}
			?>

		</div>
		<div class="row">
			<?php if (isset($_SESSION['login'])) {
				if(!$_SESSION['login']){
				echo "<div class=\"column\"><a class= \"botonGuay\" id= \"Botonempresa\" href=\"vista/user_signup.php\">Registro de usuarios</a></div>";
				}
			} ?>

		</div>
	</div>
  		<?php require ("vista/common/footer.php")?>
</body>
</html>
