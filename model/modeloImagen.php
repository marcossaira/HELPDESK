<?php
include_once('conectarBaseDatos.php');
class modeloImagen extends conectarBaseDatos
{
    public function registrarImagen($nomImagenes)
    {
        $mysqli = $this->conecta();
        // Iniciamos una transacción
        $mysqli->begin_transaction();

        try {
            // Iteramos sobre el array de imágenes y realizamos la inserción uno por uno
            foreach ($nomImagenes as $nombreImagen) {
                $nombreImagen = $mysqli->real_escape_string($nombreImagen); // Evitamos posibles problemas de seguridad (SQL injection)
                $query = "INSERT INTO imagen (nomImagen) VALUES ('$nombreImagen')";
                if (!$mysqli->query($query)) {
                    throw new Exception("Error al insertar la imagen '$nombreImagen': " );
                }
                $idImagen = $mysqli->insert_id;
                echo "Imagen '$nombreImagen' insertada correctamente con ID: $idImagen.<br>";

                 // Agregamos el ID al array de IDs insertados
                $idsInsertados[] = $idImagen;   
            }

            // Confirmamos la transacción
            $mysqli->commit();
        } catch (Exception $e) {
            // Si ocurre algún error, deshacemos la transacción
            $mysqli->rollback();
            echo "Error en la transacción: " . $e->getMessage();
        }
        $this->desconecta($mysqli);
        return $idsInsertados;    
    }
    public function listarImgX($idRproblema)
    {
        $query="SELECT i.nomImagen
                FROM  rproblema r, probimagen x, imagen i
                WHERE  r.idRproblema='$idRproblema' AND x.idRproblema=r.idRproblema AND x.idImagen=i.idImagen";
        $mysqli=$this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $img = $resultado->fetch_all(MYSQLI_ASSOC);
        return $img;
    }
}
?>