
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
require_once ("../includes/conexion.php");
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
	<?php
      $SA = SA_Eventos::getInstance();
      $ListOfEvents = $SA->getAllElements();

      if(isset($_POST['botton']))
      {
        $aux = $_POST['botton'];
        $aux2 = $_SESSION['nombre'];
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "INSERT INTO anadir(id_usuario, nombre_perro) VALUES ('".$aux2."', '".$aux."')";
        $resultado = mysqli_query($conn,$query);
      }


      foreach($ListOfEvents as $value){
        echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
          echo '<a href ="/ProyectoABD/vista/perfEvento.php" ><img src= "/ProyectoABD/img/'.$value->getImagenEvento().'"  style="width:100%"></a>';
          echo ' <p> '. $value->getNombre(). '</p>';
          echo '<p> '. $value->getLocalizacion(). '</p>';
          echo "Cantidad: ";  echo $value->getCantidad();
          echo '<p> '."Precio: ";  echo $value->getPrecio() ;
          echo '<form action = "listaEventos.php"method = "post">';
          echo '<p><button type="submit" name = "botton" value = "'. $value->getNombre().'">Añadir</button>';
            echo '</form>';
        echo'</div>';
      }
    ?>

	</div>
  <?php require("common/footer.php")?>
</body>
