<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        ini_set('display_errors', 1);
        ini_set('html_errors', 1);
        require ("../negocio/partidoReglasNegocio.php");

        $id_torneo=$_GET['partido'];
        $torneoDA=new PartidoReglasNegocio();
        $torneoDA->borrar($id_torneo);

        header("Location: gestionTorneosVista.php?partido=".$_GET['partido']."&torneo=".$_GET['torneo']);
    }
?>