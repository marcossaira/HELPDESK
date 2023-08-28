<?php
class conectarBaseDatos
{
    protected function conecta()
    {
        $mysqli = new mysqli('localhost', 'root','','alfahelpdesk2');
        if ($mysqli->connect_errno) {
            echo "Error al conectar a la base de datos: " . $mysqli->connect_error;
            return false;
        }
        return $mysqli;
    }

    protected function desconecta($mysqli)
    {
        $mysqli->close();
    }
}
?>
