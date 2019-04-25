
<?php
 require_once ("../includes/config.php");
require_once ("../includes/conexion.php");
require_once ("../logica/SA_Eventos.php");
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
        $consul = "SELECT * FROM anadir WHERE id_usuario = '".$_SESSION['nombre']."'";
        $query = mysqli_query($conn,$consul);
        $lista = array();
        while($row = mysqli_fetch_array($query)){
          $lista[] = $row['nombre_perro'];
        }
        
        foreach($lista as $perro){
          echo $perro;
        }
        ?>
        </div>
        </body>
      </html>
