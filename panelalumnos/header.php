<header>
	<!--Comentario-->
	<div class="navbar-fixed">
		<nav class="orange darken-4">
			<div class="nav-wrapper content">
				<a class="brand-logo">IKNAL</a>
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down" style="margin-right: 20px">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="comite.php">comite de tesis</a></li>
			<li><a href="perfil.php">Perfil</a></li>
			<li><a href=""></a></li>
			<li><a href="../index.php?logout"><i class="material-icons left">launch</i>Salir</a></li>
				</ul>
			</div>
		</nav>
	</div>

	<ul id="slide-out" class="side-nav fixed">
		<li><div class="userView">
			<div class="background">
				<img src="images/bg.png" style="width: 100%;">
			</div>
			<a href="#!user"><img class="circle" src="images/perfil.jpg"></a>
			<a href="#!name" class='dropdown-button blue-grey-text text-darken-4' data-beloworigin="true" href='#' data-activates='user-dw'><span class=" name"><?php echo $getinformation->nombre_alumno,' ',$getinformation->apellidop_alumno; ?><i class="material-icons" id="icon">arrow_drop_down</i></span></a>
			<a href="#!email" class="top-space"><span class="white-text email">Matricula</span></a>
		</div></li>
		<li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
		<li><a href="projects/my.php"><i class="material-icons">work</i>Mi proyecto</a></li>
		
		<ul class="collapsible" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header">
		      	<i class="material-icons">subject</i> Carreras
		      </div>
		      <div class="collapsible-body blue-grey darken-4" style="padding: 0;">
		      	<ul>
		      		<?php while($degree = $conexion::RunArray($getdegrees)){ ?>
		      			<li><a href="projects/list.php?degree=<?php echo $degree['carrera']; ?>" class="waves-effect white-text active"><?php echo ($degree['carrera'] == 'No definido') ? 'No definido' : $degree['carrera']; ?> </a></li>
		      		<?php } ?>
		      	</ul>
		      </div>
		    </li>
		</ul>

		<div class="hide-on-large-only">
			<li><a href="index.html">Inicio</a></li>
			<li><a href="comite.html">comite de tesis</a></li>
			<li><a href="perfil.php">Perfil</a></li>
		</div>   
	</ul>

	<ul id='user-dw' class='dropdown-content'>
		<li><a href="account.php">Mi cuenta</a></li>
		<li><a href="../index.php?logout">Cerrar sesión</a></li>
	</ul>
</header>