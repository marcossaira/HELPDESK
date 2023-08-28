<?php
include_once('conectarBaseDatos.php');
class modeloEmpleado extends conectarBaseDatos
{
    public function datosEmpleado($login, $password)
    {
        $query = "SELECT e.nombres, e.apellidos, e.cargo, e.descripción,e.form, e.idUsuario
                  FROM empleados e, usuario
                  WHERE u.login='$login'and u.password='$password' and u.estado='1' and u.idUsuario=e.idUsuario";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        return $resultado;
    }
}