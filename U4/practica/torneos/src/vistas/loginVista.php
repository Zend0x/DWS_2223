<!DOCTYPE html>
<html>
<head>
<?php

    require ("../negocio/usuarioReglasNegocio.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuarioBL = new UsuarioReglasNegocio();
        $perfil =  $usuarioBL->verificar($_POST['username'],$_POST['contrasena']);
        if(strlen($_POST['contrasena'])>=8){
            if ($perfil==="administrador"){
                session_start(); //inicia o reinicia una sesión
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['userType']="admin";
                header("Location: torneosVistaAdmin.php");
            }else if($perfil==="jugador"){
                session_start(); //inicia o reinicia una sesión
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['userType']="player";
                header("Location: torneosVistaUsuario.php");
            }else{
                $error = true;
            }
        }else{
            $badPass=true;
        }
    }
?>
    <title>Login</title>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <div class="contenedorGeneral">
        <div class="formularioLogin">
            <form id="formulario" method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><br>
                <label for = "username"> Usuario: </label><br>
                <input id="username" name = "username" type = "text"><br>
                <label for = "contrasena"> Contraseña: </label><br>
                <input id = "contrasena" name = "contrasena" type = "password"><br>
                <input type = "submit">
            </form>

            <?php
                if (isset($error))
                {
                    print("<div style='color:red;'> No tienes acceso </div>");
                }else if(isset($badPass)){
                    print("<div style='color:red;'>Contraseña demasiado corta. 8 carácteres como mínimo.</div>");
                }
            ?>
        </div>
        
    </div>
</body>
</html>