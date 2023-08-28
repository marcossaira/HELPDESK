<?php
include_once('conectarBaseDatos.php');

class modeloEstado extends conectarBaseDatos
{
    public function listarEstado()
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
    
    public function cambioEstado($idEstado,$idRproblema){
        $query="UPDATE rproblema
                SET idEstado='$idEstado'
                WHERE idRproblema='$idRproblema'";
        $mysqli=$this->conecta();
        $respuesta=$mysqli->query($query);// si se ejecuto correctamente true sino false
        $this->desconecta($mysqli);
        return $respuesta;
    }
    public function ponerEnAtencion($idRproblema){
        $query="UPDATE rproblema
                SET idEstado='2'
                WHERE idRproblema='$idRproblema'";
        $mysqli=$this->conecta();
        $mysqli->query($query);
        $filasAfectadas = $mysqli->affected_rows;//para ver si hubieron cambios
        $this->desconecta($mysqli);
        if ($filasAfectadas > 0) {
            return true; // Cambio efectuado
        } else {
            return false; // No se realizó ningún cambio
        }
    }
    public function registroAtendido($idRproblema){
        $query="UPDATE rproblema
        SET idEstado='3'
        WHERE idRproblema='$idRproblema'";
        $mysqli=$this->conecta();
        $mysqli->query($query);
        $filasAfectadas = $mysqli->affected_rows;//para ver si hubieron cambios
        $this->desconecta($mysqli);
        if ($filasAfectadas > 0) {
            return true; // Cambio efectuado
        } else {
            return false; // No se realizó ningún cambio
        }
    }
    public function registroEnEspera($idRproblema){
        $query="UPDATE rproblema
        SET idEstado='1'
        WHERE idRproblema='$idRproblema'";
        $mysqli=$this->conecta();
        $mysqli->query($query);
        $filasAfectadas = $mysqli->affected_rows;//para ver si hubieron cambios
        $this->desconecta($mysqli);
        if ($filasAfectadas > 0) {
            return true; // Cambio efectuado
        } else {
            return false; // No se realizó ningún cambio
        }
    }
}
?>