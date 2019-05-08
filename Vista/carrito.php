
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

          if(isset($_POST['delete'])){
            $perro = $_POST['delete'];
            $nombreUser = $_SESSION['nombre'];
            $sql = sprintf("DELETE FROM anadir WHERE nombre_perro = '$perro' AND  id_usuario = '$nombreUser'");
            $res = $conn->query($sql);

          }
        if($_SESSION['login']){
          $consul = "SELECT * FROM anadir WHERE id_usuario = '".$_SESSION['nombre']."'";
          $query = mysqli_query($conn,$consul);
          $lista = array();
          while($row = mysqli_fetch_array($query)){
              $lista[] = $row['nombre_perro'];
            }

            foreach($lista as $perro){
              echo '<div id= "card">';
              echo '<p> '.$perro;
              echo '<form action="carrito.php" method="post">';
              echo '<p><button class = "botton" type="submit" name = "delete" value ="'.$perro.'">Delete</button>';
              echo '</form>';
              /*echo '<button class="red-button" type="submit" name="delete" value="'.$companyName.'">Delete</button>';*/
              echo'</div>';
            }
      }


        ?>
        </div>
        </body>
      </html>
