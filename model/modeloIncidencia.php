<?php
include_once('conectarBaseDatos.php');
class modeloIncidencia extends conectarBaseDatos
{
    public function listarIncidencia()
    {
        $query = "SELECT * FROM incidencia";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $datos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $datos;
    }
}
?>