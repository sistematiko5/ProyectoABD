<?php require_once ("../includes/config.php"); ?>
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

  		<div class="rowC"> <!--Row titulo-->
  			<div class="titulo">Conócenos</div>
  		</div>

  		<div class="rowC">
        <div class ="descripcion">
  				<p>Esta página ha sido realizada como parte de un proyecto universitario de la Universidad Complutense de Madrid.</p>
          <p>"Nuestro proyecto se trata de una web para poner en contacto a personas interesadas
          en el mundo del emprendimiento que estén en la etapa laboral de su vida con startups
           en cualquier fase que quieran buscar a nuevos integrantes en sus equipos.</p>
  			</div>
      </div>

      <div class="rowC">
    		<div class="titulo">Nuestro equipo</div>
    	</div>

		<div class="row_content"  id="pers2">
			<div class="conocenosCard">
				<h2>Pablo Fernández Jara</h2>
	   			<h3><i>pablof10@ucm.es</i></h3>
				<p>Yo soy Pablo Fernández Jara, el creador de esta página web y he creado esta página para todos los amantes de los perros que quieran comprarse uno en especial y no saben que raza comprar. Yo tengo un perro de aguas español y me costo mucho encontrar el perro que se asemejase a mi perfil.</p>
			</div>
		</div>



    <div class="rowC"> <!--Row titulo-->
      <div class="titulo">Si tienes alguna pregunta</div>
    </div>

      <div class="row"> <!--/Row Formulario contacto-->
        <body>
        	<form action="" method="post" class="form-consulta"> <!-- /ProyectoStartOn/logica/tratadoContacto.php -->
        		<label>Nombre y apellido: <span>*</span>
        			<input type="text" name="nombre" placeholder="Nombre y apellido" class="campo-form" required>
        		</label>

        		<label>Email: <span>*</span>
        			<input type="email" name="email" placeholder="Email" class="campo-form" required>
        		</label>

        		<label>Consulta:
        			<textarea name="consulta" class="campo-form"></textarea>
        		</label>

        		<input type="submit" value="Enviar" class="btn-form">
        	</form>
        </body>
      </div>
  </div>
  </body>
      		<?php require("common/footer.php")?>
</html>
