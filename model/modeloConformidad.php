<?php
include_once('conectarBaseDatos.php');

class modeloConformidad extends conectarBaseDatos
{
    public function registrarConformidad($idRproblema)
    {   $query1="SELECT MAX(idProbTrabajador) AS max_idProbTrabajador
        FROM probtrabajador
        WHERE idRproblema = $idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query1);
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $max_idProbTrabajador = $fila['max_idProbTrabajador'];
            $max_idProbTrabajadorString = strval($max_idProbTrabajador);
        }
        $query2="INSERT INTO conformidad (idProbTrabajador,estado) 
        VALUES ('$max_idProbTrabajadorString','1')";
        $mysqli->query($query2);
        $this->desconecta($mysqli);
        return;
    }
    public function registrarNoConformidad($idRproblema)
    {   $query1="SELECT MAX(idProbTrabajador) AS max_idProbTrabajador
        FROM probtrabajador
        WHERE idRproblema = $idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query1);
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $max_idProbTrabajador = $fila['max_idProbTrabajador'];
            $max_idProbTrabajadorString = strval($max_idProbTrabajador);
        }
        $query2="INSERT INTO conformidad (idProbTrabajador,estado) 
        VALUES ('$max_idProbTrabajadorString','1')";
        $mysqli->query($query2);
        $this->desconecta($mysqli);
        return;
    }
}
?>