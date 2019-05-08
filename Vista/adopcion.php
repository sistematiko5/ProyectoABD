
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
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $consul = "SELECT * FROM adopcion ";
    $query = mysqli_query($conn,$consul);
    $lista = array();
    $listaRaza = array();

    while($row = mysqli_fetch_array($query)){
        $lista[] = $row['nombre'];
        $listaRaza[] = $row['raza'];
      }
        if(isset($_POST['añadir'])){
          $aux2 = $_POST['nombre'];
          $aux = $_POST['raza'];
          $app = Aplicacion::getSingleton();
          $conn = $app->conexionBd();
          $query = "INSERT INTO adopcion(nombre, raza) VALUES ('".$aux2."', '".$aux."')";
          $resultado = mysqli_query($conn,$query);
        }
        if(isset($_POST['delete'])){
          $perro = $_POST['delete'];
          $sql = sprintf("DELETE FROM adopcion WHERE nombre = '$perro'");
          $res = $conn->query($sql);

        }
    foreach($lista as $perro){
        echo '<div id= "card">';
        echo ' <p> '.   $perro. '</p>';
        echo '<form action="adopcion.php" method="post">';
        echo '<p><button class = "botton" type="submit" name = "delete" value ="'.$perro.'">Delete</button>';
        echo '</form>';
        echo'</div>';

      }

?>
  <form action = "adopcion.php"method = "post">
    Nombre: <input type="text" name="nombre"><br>
    Raza: <input type="text" name="raza"><br>
    <?php
    echo '<p><button class = "botton" type="submit" name = "añadir" >Añadir</button>';
    ?>
  </form>
<?php
  require("common/footer.php")
?>
</body>
