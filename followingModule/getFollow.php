<?php
if (!empty($_POST["btnConforme"])) {
    $idRproblema = $_POST["btnConforme"];
    include_once('controlFollow.php');
    $objControlFollow= new controlFollow;
    $objControlFollow->conformidadAtencion($idRproblema);
   }
elseif (!empty($_POST["btnNoConforme"])) {
    $idRproblema = $_POST["btnNoConforme"];
    include_once('controlFollow.php');
    $objControlFollow= new controlFollow;
    $objControlFollow->atencionNoConforme($idRproblema);
   }
?>