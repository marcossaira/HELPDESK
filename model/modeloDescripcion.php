<?php
include_once('conectarBaseDatos.php');

class modeloDescripcion extends conectarBaseDatos
{
    public function registrarDescripcion($descripcion)
    {
        $query = "INSERT INTO descripcion (detalleDesc) 
        VALUES ('$descripcion')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $idDesc = $mysqli->insert_id;
        $this->desconecta($mysqli);
        return $idDesc;
    }
}
?>