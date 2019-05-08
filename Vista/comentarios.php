<!DOCTYPE html>
<?php
include 'conexionMongo.php';
session_start();
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
				$db = conectar();
				$id = $_SESSION['id_empresa'];

			if(isset($_POST['delete'])){
				$borrar = $_POST['delete'];
				$tabla = $db->commentsDB->comentarios;
				$tabla->deleteOne(["_id"=>new MongoDB\BSON\ObjectId("$borrar")]);
			}

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				if(isset($_POST['submit'])){
				$titulo = test_input($_POST["titulo"]);
						$texto = test_input($_POST["texto"]);
						$nombre = $_SESSION['nombre'];

						$table = $db->commentsDB->comentarios;
						$document = array(
							"nombre"=>$nombre,"titulo" => $titulo, "texto"=>$texto
						);
						$table->insertOne($document);
				}
			}

			$lista = $db->commentsDB->comentarios;
			$value = $lista->find();

			foreach($value as $document){  /* Follows will be created and deleted from the companies list*/
			 echo  '<div class="row">';
				 echo '<div class= "conocenosCard">';
					 echo ' <h3 class="conocenos"> '. $document["titulo"] .'</h3>';
					 echo ' <p class="conocenos"> '. $document["texto"] .'</p>';
					 $id = $document["_id"];
					 echo '<form action="comentarios.php" method="post">';
						 echo '<button class="botonSubmitE" type="submit" name="delete" value="'.$id.'">Delete</button>';
					 echo '</form>';
				 echo'</div>';
			 echo'</div>';
		 }
}
else{
	echo  '<div class="row">';
	echo  '<h2> No has iniciado sesion</h2>';
	echo  '</div>';
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
		 <div class="row">
		 </form>
		 <form class="" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			 <h2>Crea un comentario:</h2>
			 <p>Asunto: <input  class="form" type="text" name="titulo" value=""></p>
			 <p>Texto: <input  class="form" type="text" name="texto" value=""></p>
			 <input class="" type="submit" name="submit" value="Aceptar">
			 </form>
		 </div>


</body>
</html>
