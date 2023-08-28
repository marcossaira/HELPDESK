<?php
include_once('conectarBaseDatos.php');

class modeloUsuario extends conectarBaseDatos
{
    public function verificarUsuario($login, $password)
    {
        $password = md5($password); //encriptacion
        $query = "SELECT u.login, IF(p.idUsuario IS NOT NULL, 'personal', 'trabajador') AS user_table
                FROM usuario u
                LEFT JOIN personal p ON u.idUsuario = p.idUsuario
                LEFT JOIN trabajador t ON u.idUsuario = t.idUsuario
                WHERE u.login = '$login'
                  AND u.password = '$password'
                  AND u.estado = 1";
        ;
        $mysqli = $this->conecta();
        $result = $mysqli->query($query);
        $this->desconecta($mysqli);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $userLogin = $row['login'];
            $userTable = $row['user_table'];
            return $userTable;
        }
    }

    public function datosPersonal($login, $password)
    {
        $password = md5($password);
        $query = "SELECT p.idPersonal, p.nomPersonal, a.nomArea, s.nomSede, e.nomEmpresa
        FROM area a, sede s, empresa e, personal p, usuario u
        WHERE u.login='$login' AND u.password='$password'  AND u.idUsuario=p.idUsuario AND p.idArea=a.idArea AND a.idSede=s.idSede AND s.idEmpresa=e.idEmpresa";
        $mysqli = $this->conecta();
        $client = $mysqli->query($query);
        $this->desconecta($mysqli);
        $cliente = $client->fetch_all(MYSQLI_ASSOC);
        return $cliente;
    }
    public function datosTrabajador($login, $password)
    {
        $password = md5($password);
        $query = "SELECT t.idTrabajador,t.nomTrabajador, t.apeTrabajador,t.dirTrabajador,t.cargoTrabajador,t.idUsuario
        FROM trabajador t,usuario u
        WHERE u.login='$login' AND u.password='$password'AND t.idUsuario=u.idUsuario ";
        $mysqli = $this->conecta();
        $trabajador = $mysqli->query($query);
        $this->desconecta($mysqli);
        $worker = $trabajador->fetch_all(MYSQLI_ASSOC);
        return $worker;
    }
}
?>