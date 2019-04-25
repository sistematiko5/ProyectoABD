<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
	<div id="cabecera">
	<ul>
		<li><a href="/ProyectoABD/index.php">Inicio</a>
		<li><a href="/ProyectoABD/vista/listUsuario.php">Usuarios</a>
		<li><a href="/ProyectoABD/vista/listaEventos.php">Razas de perros</a>
		<li><a href="/ProyectoABD/vista/conocenos.php">Conócenos</a>
		<li><a href="/ProyectoABD/vista/ayuda.php">Ayuda</a>
		<li><a href="/ProyectoABD/vista/carrito.php">Carrito</a>
		<li><a href="/ProyectoABD/vista/comentarios.php">Comentarios</a>
		<?php
			if(!$_SESSION['login'])
				echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoABD/vista/login.php">Inicia sesión</a>';
			else{
				echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoABD/vista/logout.php">Cerrar sesión</a>';
				if(isset($_SESSION['id_empresa']))
					echo '<li style="float:right"><a id="inicio_sesion" href="/ProyectoABD/vista/perfUser.php">Perfil</a>';
			}
		?>
	</ul>
</div>
