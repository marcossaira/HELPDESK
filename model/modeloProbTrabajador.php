<?php
include_once('conectarBaseDatos.php');
class modeloProbTrabajador extends conectarBaseDatos
{
    public function registrarProbTrabajadorEnAtencion($idRproblema,$idTrabajador)
    {
        $query = "INSERT INTO probtrabajador (idRproblema, idTrabajador,idEstado,fechaCambio,horaCambio) 
                  VALUES ('$idRproblema', '$idTrabajador','2',CURDATE(),CURTIME())";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return;
    }
    
    public function registrarProbTrabajadorAtendido($idRproblema,$idTrabajador)
    {
        $query = "INSERT INTO probtrabajador (idRproblema, idTrabajador,idEstado,fechaCambio,horaCambio) 
                  VALUES ('$idRproblema', '$idTrabajador','3',CURDATE(),CURTIME())";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return;
    }

    public function registrarProbTrabajadorEnEspera($idRproblema,$idTrabajador)
    {
        $query = "INSERT INTO probtrabajador (idRproblema, idTrabajador,idEstado,fechaCambio,horaCambio) 
                  VALUES ('$idRproblema', '$idTrabajador','1',CURDATE(),CURTIME())";
        $mysqli = $this->conecta();
        $mysqli->query($query);
        $this->desconecta($mysqli);
        return;
    }
    public function listarAtenciones()
    {
        $query="SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,d.nomEstado,e.nomEmpresa,j.fechaCambio,j.horaCambio,t.nomTrabajador,t.apeTrabajador
                FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion d, empresa e, probtrabajador j, trabajador t
                WHERE j.idEstado='3' AND r.idIncidencia=i.idIncidencia AND r.idPersonal=p.idPersonal
                AND p.idArea=a.idArea AND a.idSede=s.idSede AND s.idEmpresa=e.idEmpresa 
                AND r.idEstado=d.idEstado AND j.idTrabajador=t.idTrabajador
                AND j.idRproblema=r.idRproblema
                ORDER BY idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    
    }   
}
?>