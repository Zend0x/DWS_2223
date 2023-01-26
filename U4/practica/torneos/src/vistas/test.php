
<?php

require("../infraestructura/usuarioAccesoDatos.php");

function test_alta_usuario()
{
    $u = new UsuarioAccesoDatos();
    return $u->insertar('fernando','administrador','12345678');
}

function test_verificar_usuario_encontrado()
{
    $perfil_esperado = 'administrador';
    $u = new UsuarioAccesoDatos();
    $perfil = $u->verificar('fernando','12345678');
    return $perfil === $perfil_esperado;
}

ini_set('display_errors', 1);
ini_set('html_errors', 1);

var_dump(test_alta_usuario());
var_dump(test_verificar_usuario_encontrado());