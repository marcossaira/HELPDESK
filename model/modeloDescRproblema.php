<?php
include_once('conectarBaseDatos.php');

class modeloDescRproblema extends conectarBaseDatos
{
    public function registrar($idRproblema,$descripcion)
    {
        $query = "INSERT INTO descrproblema (idRproblema,idDescripcion,estado) 
        VALUES ('$idRproblema','$descripcion','1')";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return;
    }
}
?>