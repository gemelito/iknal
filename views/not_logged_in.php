<!-- errors & messages --->
<?php

// show negative messages
if ($login->errors) {
    foreach ($login->errors as $error) {
        echo $error;    
    }
}

// show positive messages
if ($login->messages) {
    foreach ($login->messages as $message) {
        echo $message;
    }
}

?>
<!-- errors & messages --->

<!-- login form box -->
<html lang="es">
    <head> 
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta charset="utf-8" />
    </head>
<body>
<br> <br> <br> <br> <br>
    <br>  <br>
<section>
    <h1>Sistema de Tutoría IKNAL</h1>
    <div>
        <img src="images/logo.png"  style="position: relative; top:0px; left: 0px;">
        <form method="post" action="index.php" name="loginform">      
            <label for="login_input_username"></label>
            <input id="login_input_username" placeholder="Usuario" class="login_input" type="text" name="user_name" maxlength="15"required />
           
            <label for="login_input_password"></label>
            <input id="login_input_password" placeholder="Contraseña" class="login_input" type="password" name="user_password" autocomplete="off" required maxlength="15"/>
            <br />
            <br />
            <input type="submit"  name="login" value="Accesar" />
            <!--<a href="../index.php"><input type="button" value="Regresar" class="enviar"> </a></p>-->
        </form>
</section>
</body>
<!--<a href="register.php">Register new account</a>-->