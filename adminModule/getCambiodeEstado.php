<?php
if (!empty($_POST["btnmodificar"])) {
    $idRproblema = $_POST["btnmodificar"];
    $idEstado = $_POST["id_estado$idRproblema"];
    include_once('controlCambio.php');
    $objControlEstado= new controlCambio();
    $objControlEstado->cambiarEstado($idEstado,$idRproblema);
   }
?>