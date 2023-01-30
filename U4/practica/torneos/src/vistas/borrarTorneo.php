<?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $id_torneo=$_GET['torneo'];
        $torneoDA=new TorneosAccesoDatos();
        $torneoDA->borrar($id_torneo);

        header("Location: torneosVistaAdmin.php");
    }
?>