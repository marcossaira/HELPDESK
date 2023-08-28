<?php
include_once('conectarBaseDatos.php');

class modeloUsuarioPrivilegio extends conectarBaseDatos
{
    public function obtenerPrivilegios($login)
    {
        $query = "SELECT P.pathPriv,P.labelPriv,P.buttonPriv,P.iconPriv
        FROM privilegio P, usuarioprivilegios UP, usuario U
        WHERE  U.login='$login'AND U.idUsuario=UP.idUsuario AND P.idPrivilegio=UP.idPrivilegio";

        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($resultado->num_rows > 0) {
            $privilegios = $resultado->fetch_all(MYSQLI_ASSOC);
            return $privilegios;
        } else {

            return [];
        }
    }
}
?>
