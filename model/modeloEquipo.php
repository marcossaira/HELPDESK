<?php
include_once('conectarBaseDatos.php');

class modeloEquipo extends conectarBaseDatos
{
    public function listarEquipo()
    {
        $query = "SELECT *
                  FROM estadoatencion";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultado->num_rows > 0) {
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $datos;
        } else {
            return [];
        }
}
}
?>