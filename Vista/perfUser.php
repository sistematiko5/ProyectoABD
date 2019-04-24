<!DOCTYPE html>
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
?>

<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>TodoPerros</title>
</head>

<body>

	<?php require("common/header.php")?>

	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && isset($_SESSION['id_empresa'])){
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa']))){
				$id = $_SESSION['id_empresa'];
				$SA = SA_Usuario::getInstance();
				$transfer = $SA->getElement($id);
			}
			else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Usuario::getInstance();
			$transfer = $SA->getElement($id);
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET){
			$id = htmlspecialchars($_GET["id"]);
			$SA = SA_Usuario::getInstance();
			$transfer = $SA->getElement($id);

		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<div id="perfil">
		<div id="card">
			<?php
			echo '<a href ="/ProyectoABD/vista/perfUser.php" ><img src= "/ProyectoABD/'.$transfer->getImagenPerfil().'"  style="width:100%"></a>';
			echo '<p id ="burbuja"> '.$transfer->getNombre().'</p>';
			echo '<p id ="burbuja"> '.$transfer->getLocalizacion().'</p>';
			?>
		</div>

		<div id="card">
			<h2>Carta de presentacion</h2>
			<?php
				echo "<p> ".$transfer->getCartaPresentacion()." </p>";
			?>
		</div>

		<div id="ModPerf">
		<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == true)
			if($_SERVER["REQUEST_METHOD"] !== "GET" || ($_SERVER["REQUEST_METHOD"] == "GET" && (!$_GET || $_GET["id"]==$_SESSION['id_empresa'])))
					echo '<a  id= "botonSubmit" class ="botonGuay" href="mod_perf.php" >Modificar perfil</a>';
		?>
	</div>
	</div>

		<?php require("common/footer.php")?>
</body>
</html>
