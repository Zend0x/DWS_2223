<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        require ("../infraestructura/torneosAccesoDatos.php");

        $id_torneo=$_GET['torneo'];
        $torneoDA=new TorneosAccesoDatos();
        $torneoDA->borrar($id_torneo);

        header("Location: torneosVistaAdmin.php");
    }
?>