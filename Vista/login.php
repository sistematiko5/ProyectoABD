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
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$email = test_input($_POST["email"]);
					$password = sha1(md5(test_input($_POST["password"])));


            $SA = SA_Usuario::getInstance();
            $transfer = new usuarioTransfer("","",$password, $email,"", "" ,"");
            $dir = $SA->login($transfer);
            if($dir !== "error"){
              header('Location: '.$dir);
            }
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
				?>

				<h2>Inicia sesión:</h2>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-consulta">
				  <p>E-mail: <input type="email" name="email" value="" class="campo-form"></p>
				  <p>Contraseña: <input type="password" name="password" value="" class="campo-form"></p>
				  <input id= 'botonSubmit' class ='botonGuay' type="submit" name="submit" value="Submit">
		  		</form>
			</div>
			<?php require("common/footer.php")?>
		</div>
</body>
</html>
