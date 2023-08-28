<?php
include_once('conectarBaseDatos.php');
class modeloProbImagen extends conectarBaseDatos
{
    public function registrarProbImagen($idRproblema,$idImagenes)
    {
        $mysqli=$this->conecta();
        // Iniciamos una transacción
        $mysqli->begin_transaction();
        
        try {
            // Iteramos sobre el array de IDs de imágenes y realizamos la inserción en la tabla intermedia
            foreach ($idImagenes as $idImagen) {
                $query = "INSERT INTO probimagen (idRproblema, idImagen) VALUES ('$idRproblema', '$idImagen')";
        
                if (!$mysqli->query($query)) {
                    throw new Exception("Error al insertar el ID de imagen $idImagen para la incidencia $idRproblema: ");
                }
                echo "Imagen con ID $idImagen asociada a la incidencia con ID $idImagen correctamente.<br>";
            }
        
            // Confirmamos la transacción
            $mysqli->commit();
        } catch (Exception $e) {
            // Si ocurre algún error, deshacemos la transacción
            $mysqli->rollback();
            echo "Error en la transacción: " . $e->getMessage();
        }
        $this->desconecta($mysqli);
    }
}
?>