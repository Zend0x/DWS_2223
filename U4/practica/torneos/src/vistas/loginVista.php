<?php

    require ("../negocio/usuarioReglasNegocio.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $usuarioBL = new UsuarioReglasNegocio();
        $perfil =  $usuarioBL->verificar($_POST['username'],$_POST['contrasena']);
        if(strlen($_POST['contrasena'])>=8){
            if ($perfil==="administrador"){
                session_start(); //inicia o reinicia una sesión
                $_SESSION['username'] = $_POST['username'];
                header("Location: torneosVistaAdmin.php");
            }else if($perfil==="jugador"){
                session_start(); //inicia o reinicia una sesión
                $_SESSION['username'] = $_POST['username'];
                header("Location: torneosVistaUsuario.php");
            }else{
                $error = true;
            }
        }else{
            $badPass=true;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset = "UTF-8">
</head>
<body>

    <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for = "username"> Usuario: </label>
        <input id="username" name = "username" type = "text">
        <label for = "contrasena"> Contraseña: </label>
        <input id = "contrasena" name = "contrasena" type = "password">
        <input type = "submit">
    </form>

    <?php
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        if (isset($error))
        {
            print("<div style='color:red;'> No tienes acceso </div>");
        }else if(isset($badPass)){
            print("<div style='color:red;'>Contraseña demasiado corta. 8 carácteres como mínimo.</div>");
        }
    ?>
</body>
</html>