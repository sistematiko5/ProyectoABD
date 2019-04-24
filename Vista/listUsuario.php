
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Usuario.php");
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/common.css">
	<title>TodoPerros</title>
	<meta charset="utf-8">
</head>
<body>
    <?php require("common/header.php")?>
	<div id="container">
		<div class="row">
			<?php
				$SA = SA_Usuario::getInstance();
				$ListOfEmp = $SA->getAllElements();
				foreach($ListOfEmp as $value){
					echo '<div id= "card">';
						echo '<img src= "/ProyectoABD/img/usuario.png"  style="width:100%"></a>';
						echo ' <p> '. $value->getNombre(). '</p>';
						echo '<p> '. $value->getLocalizacion(). '</p>';
						echo '<p> '. $value->getCartaPresentacion(). '</p>';
					echo'</div>';
				}
			?>
		</div>
	</div>
  		<?php require("common/footer.php")?>
</body>
