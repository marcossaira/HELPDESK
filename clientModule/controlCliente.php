<?php
class controlCliente
{  
        public function registro($descripcion,$idIncidencia,$arrayImagenes)
    {
        include_once('../model/modeloRproblema.php');
        include_once('../model/modeloImagen.php');
        include_once('../model/modeloProbImagen.php');
        $objModeloRproblema= new modeloRproblema();
        $objModeloImagen= new modeloImagen();
        $objModeloProbImagen= new modeloProbImagen;
        session_start();
        $idPersonal= $_SESSION['idPersonal'];
        $idRegistro=$objModeloRproblema->registrarSolicitud($idPersonal,$descripcion,$idIncidencia);
        var_dump($arrayImagenes);
        
        if (!empty($arrayImagenes)) {
            $idsImagenes = $objModeloImagen->registrarImagen($arrayImagenes);
            session_unset();
            
            if ($idRegistro != null) {
                $objModeloProbImagen->registrarProbImagen($idRegistro, $idsImagenes);
            } else {
                echo 'SU PEDIDO NO SE PUDO PROCESAR';
            }
        } else {
            echo 'El array de imágenes está vacío, no se ejecutaron las funciones de registro de imágenes.';
        }

        var_dump($arrayImagenes);
    }
}
?>