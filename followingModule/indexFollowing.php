<?php session_start();

include_once('../model/modeloRproblema.php');
$objModeloRproblema= new modeloRproblema();
$idPersonal= $_SESSION['idPersonal'];
$data=$objModeloRproblema->seguimientoAtencion($idPersonal);
include_once('../followingModule/formViewFollow.php');
$objFormViewFollow= new formViewFollow();
$objFormViewFollow->formViewFollowShow($data);
?>