<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Start On</title>
</head>
<body>
	<?php require("common/header.php")?>
	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$nombre = test_input($_POST["nombre"]);
			$password = sha1(md5(test_input($_POST["password"])));
			$email = test_input($_POST["email"]);
			$localizacion = test_input($_POST["localizacion"]);
			$imagen = test_input($_POST["imagen"]);
			$presentacion = test_input($_POST["presentacion"]);



			if(isset($_SESSION["id_empresa"])){
				$SA = SA_Usuario::getInstance();
				$transfer = new usuarioTransfer($_SESSION["id_empresa"],$nombre,$password, $email,$localizacion,$imagen,$presentacion);
				$dir = $SA->updateElement($transfer);
		 		if($dir !== "Error"){
					header('Location: '.$dir);
				}
			}
		}
		else{
			if(isset($_SESSION['login']) && $_SESSION['login'] == true){
				if(isset($_SESSION["id_empresa"])){
          $id = $_SESSION['id_empresa'];
          $SA = SA_Usuario::getInstance();
          $transfer = $SA->getElement($id);
        }
			}
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	<div id="Modperfil">
		<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Nombre: <input type="text" name="nombre" value=<?php echo $transfer->getNombre(); ?>></p>
				<p>E-mail: <input type="email" name="email" value=<?php echo $transfer->getEmail(); ?>></p>
				<p>Contraseña: <input type="text" name="password" value=""></p>
			 	<p>Localidad: <input type="text" name="localizacion" value=<?php echo $transfer->getLocalizacion(); ?>></p>
			  <p>Presentación: <textarea rows="4" cols="20" name="presentacion" value=<?php echo $transfer->getCartaPresentacion(); ?>></textarea></p>
			  <p>Imagen de perfil: <input type="text" name="imagen" value=<?php echo $transfer->getImagenPerfil(); ?>></p>
				<input id="botoSubmitU" type="submit" name="submit" value="Guardar Cambios">
		  	</form>
		  		<input type="button" value="Borrar Perfil" onclick="borrarPerfil()"></input>

		  		<script type="text/javascript">
		  			function borrarPerfil(){
		  				if(confirm("¿Estás seguro de que quieres borrar tu perfil? (Los datos guardados se perderán para siempre)")){
		  					window.location.assign("delete.php");
		  				}
		  			}
		  		</script>
	</div>
		 <?php require("common/footer.php")?>
</body>
</html>
