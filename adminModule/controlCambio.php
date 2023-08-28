<?php
class controlCambio
{
    public function cambiarEstado($idEstado,$idRproblema)
    {
        include_once('../model/modeloEstado.php');
        $objModeloEstado= new modeloEstado();
        $td=$objModeloEstado->cambioEstado($idEstado,$idRproblema);
        include_once('../adminModule/formViewAdministrador.php');
        $objFormAd = new formViewAdministrador();
        $objFormAd->formViewAdministradorShow();
    }
}
?>