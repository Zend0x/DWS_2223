<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        require("../negocio/torneosReglasNegocio.php");

        $id_torneo=$_GET['torneo'];
        $torneoBL=new TorneosReglasNegocio();
        $torneoBL->borrar($id_torneo);

        header("Location: torneosVistaAdmin.php");
    }
?>