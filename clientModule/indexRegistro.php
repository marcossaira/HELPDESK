<?php
include_once('../model/modeloIncidencia.php');
$objModeloError= new modeloIncidencia();
$incid=$objModeloError->listarIncidencia();
include_once('../clientModule/formViewRegistro.php');
$objFormViewRegistro= new formViewRegistro();
$objFormViewRegistro->formViewRegistroShow($incid);
?>
