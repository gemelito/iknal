<header>

  <div class="navbar-fixed">
    <nav class="light-green darken-1">
      <div class="nav-wrapper content">
        <a class="brand-logo"><img src="../images/logo.png" style="width: 125px;margin-top: -4px;"></a>
        <a class="button-collapse" data-activates="slide-out" href="#">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down" style="margin-right: 300px">
          <li>
            <a href="../index.php?logout"><i class="material-icons left">launch</i>Salir</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

	<ul id="slide-out" class="side-nav fixed">
		<li><div class="userView">
			<div class="background">
				<img src="images/bg.png" style="width: 100%;">
			</div>
			<a href="#!user"><img class="circle" src="../images/alumno/<?php echo $getinformation->foto;?>"></a>
			<a href="#!name" class='dropdown-button blue-grey-text text-darken-4' data-beloworigin="true" href='#' data-activates='user-dw'><span class=" name"><?php echo $getinformation->nombre_alumno,' ',$getinformation->apellidop_alumno; ?><i class="material-icons" id="icon">arrow_drop_down</i></span></a><br>
		</div></li>
		<li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
		
		<ul class="collapsible" data-collapsible="accordion">
		    <li>
          <a class="collapsible-header">
            <i class="material-icons">work</i> Proyecto
          </a>
		      <div class="collapsible-body blue-grey darken-4" style="padding: 0;">
		      	<ul>
		      		<li><a href="projects/my.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">class</i> Mi proyecto</a>
		      		</li>
		      		<li><a href="commitee/my.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">assignment_ind</i> Mi comité</a>
		      		</li>
		      	</ul>
		      </div>
		    </li>
		</ul>

		<ul class="collapsible" data-collapsible="accordion">
		    <li>
          <a class="collapsible-header">
            <i class="material-icons">domain</i> Familia
          </a>
		      <div class="collapsible-body blue-grey darken-4" style="padding: 0;">
		      	<ul>
		      		<li><a href="family/my.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">people</i> Mi familia</a>
		      		</li>
		      		<li><a href="family/new.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">add</i> Familia</a>
		      		</li>
		      	</ul>
		      </div>
		    </li>
		</ul>

		<ul class="collapsible" data-collapsible="accordion">
		    <li>
          <a class="collapsible-header">
            <i class="material-icons">person</i> Amigos
          </a>
		      <div class="collapsible-body blue-grey darken-4" style="padding: 0;">
		      	<ul>
		      		<li><a href="friends/my.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">people</i> Mis amigos</a>
		      		</li>
		      		<li><a href="friends/new.php" class="waves-effect white-text active">
		      			<i class="material-icons white-text">add</i> Amigo</a>
		      		</li>
		      	</ul>
		      </div>
		    </li>
		</ul>

		<ul class="collapsible" data-collapsible="accordion">
		    <li>
          <a class="collapsible-header">
            <i class="material-icons">subject</i> Carreras
          </a>
		      <div class="collapsible-body blue-grey darken-4" style="padding: 0;">
		      	<ul>
		      		<?php while($degree = $conexion::RunArray($getdegrees)){ ?>
		      			<li><a href="projects/list.php?degree=<?php echo $degree['carrera']; ?>" class="waves-effect white-text active"><?php echo ($degree['carrera'] == 'No definido') ? 'No definido' : $degree['carrera']; ?> </a></li>
		      		<?php } ?>
		      	</ul>
		      </div>
		    </li>
		</ul>

	</ul>

	<ul id='user-dw' class='dropdown-content'>
		<li><a href="accounts/my.php">Mi cuenta</a></li>
		<li><a href="../index.php?logout">Cerrar sesión</a></li>
	</ul>
</header>
