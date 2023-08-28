<?php
class controlFollow
{
    public function conformidadAtencion($idRproblema)
    {
        include_once('../model/modeloConformidad.php');
        $objModelConformidad = new modeloConformidad();
        $objModelConformidad->registrarConformidad($idRproblema);
    }
    public function atencionNoConforme($idRproblema)
    {
        include_once('../model/modeloConformidad.php');
        $objModelConformidad = new modeloConformidad();
        $objModelConformidad->registrarNoConformidad($idRproblema);//actualizar la consulta en el modelo.
    }
}
?>