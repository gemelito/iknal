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

        <meta charset="utf-8" />
    </head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
<body>
<br> <br> <br> <br>
<h1></h1>
    <br>  <br> <br><br><br>
    <div class="page-container">
<img src="images/logoik23.gif"  style="position: absolute; top:200px; left: 560px;">
<form method="post" action="indexadmin.php" name="loginform">  
    
    <label for="login_input_username"></label>
    <input id="login_input_username" placeholder="Usuario" class="login_input" type="text" name="user_name" required />
   
    <label for="login_input_password"></label>
    <input id="login_input_password" placeholder="Contraseña" class="login_input" type="password" name="user_password" autocomplete="off" required />
    <button type="submit"  name="login" value="Accesar" />Accesar Administrador</botton>
</body>
<!--<a href="register.php">Register new account</a>-->