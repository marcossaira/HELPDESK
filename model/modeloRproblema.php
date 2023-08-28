<?php
include_once('conectarBaseDatos.php');

class modeloRproblema extends conectarBaseDatos
{
    public function listarRproblema()
    {
        $query = "SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,t.nomEstado,e.nomEmpresa
                  FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion t, empresa e
                  WHERE r.idIncidencia=i.idIncidencia and  r.idPersonal=p.idPersonal and p.idArea=a.idArea and  a.idSede=s.idSede and s.idEmpresa=e.idEmpresa and r.idEstado=t.idEstado order by idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    }
    public function listarRproblemaEnEspera()
    {
        $query = "SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,t.nomEstado,e.nomEmpresa
                  FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion t, empresa e
                  WHERE r.idIncidencia=i.idIncidencia and  r.idPersonal=p.idPersonal and p.idArea=a.idArea and  a.idSede=s.idSede and s.idEmpresa=e.idEmpresa and r.idEstado=t.idEstado and t.nomEstado='En Espera' order by idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    }

    public function listarRproblemaEnAtencion()
    {
        $query = "SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,t.nomEstado,e.nomEmpresa
        FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion t, empresa e
        WHERE r.idIncidencia=i.idIncidencia and  r.idPersonal=p.idPersonal and p.idArea=a.idArea and  a.idSede=s.idSede and s.idEmpresa=e.idEmpresa and r.idEstado=t.idEstado and t.nomEstado='En atención' order by idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    }
    public function listarRproblemaAtendido()
    {
        $query = "SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,t.nomEstado,e.nomEmpresa
                  FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion t, empresa e
                  WHERE r.idIncidencia=i.idIncidencia and  r.idPersonal=p.idPersonal and p.idArea=a.idArea and  a.idSede=s.idSede and s.idEmpresa=e.idEmpresa and r.idEstado=t.idEstado and t.nomEstado='Atendido' order by idRproblema";

        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    }
    public function listarRproblemaSuspendido()
    {
        $query = "SELECT r.idRproblema,p.nomPersonal,s.nomSede,a.nomArea,r.descripcion,i.nomIncidencia,r.fechaRegistro,r.horaRegistro,t.nomEstado,e.nomEmpresa
        FROM rproblema r, incidencia i,personal p, area a,sede s ,estadoatencion t, empresa e
        WHERE r.idIncidencia=i.idIncidencia and  r.idPersonal=p.idPersonal and p.idArea=a.idArea and  a.idSede=s.idSede and s.idEmpresa=e.idEmpresa and r.idEstado=t.idEstado and t.nomEstado='Suspendido' order by idRproblema";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $this->desconecta($mysqli);
        $lista = $resultado->fetch_all(MYSQLI_ASSOC);
        return $lista;
    }
    public function registrarSolicitud($idPersonal, $descripcion, $idIncidencia)
    {
        $query = "INSERT INTO rproblema(idPersonal,descripcion,idIncidencia,fechaRegistro,horaRegistro,idEstado) 
        VALUES ('$idPersonal','$descripcion','$idIncidencia',CURDATE(),CURTIME(),1)";
        $mysqli = $this->conecta();
        $resultado = $mysqli->query($query);
        $insertedId = $mysqli->insert_id;
        $this->desconecta($mysqli);
        // Verificar si la inserción fue exitosa
        if ($resultado === true) {
            return $insertedId;
        } else {
            // Hubo un error en la inserción
            return [];
        }
    }
    public function listarUsuario($idRproblema)
    {
        $query="SELECT e.nomEmpresa, s.nomSede,a.nomArea, p.nomPersonal, r.descripcion, w.nomTipoEquipo,z.numeroAnydesk,z.numeroTeamViewer 
                FROM rproblema r, personal p, area a, sede s, empresa e, personalequipo q, equipo k, soporteremoto z, tipoEquipo w 
                WHERE r.idRproblema='$idRproblema' AND r.idPersonal=p.idPersonal AND p.idArea =a.idArea 
                AND a.idSede=s.idSede AND s.idEmpresa=e.idEmpresa AND r.idPersonal=q.idPersonal 
                AND q.idPersonal=p.idPersonal AND q.idPersonalEquipo=z.idPersonalEquipo 
                AND q.idEquipo=k.idEquipo AND k.idTipoEquipo=w.idTipoEquipo";
        $mysqli=$this->conecta();
        $respuesta=$mysqli->query($query);
        $this->desconecta($mysqli);
        $datosPersonal = $respuesta->fetch_all(MYSQLI_ASSOC);
        return $datosPersonal;
    }
    public function consultaEstado($idPersonal)
    {
        $query="SELECT r.idEstado
                FROM rproblema r
                WHERE r.idPersonal=$idPersonal";
        $mysqli=$this->conecta();
        $respuesta=$mysqli->query($query);
        $this->desconecta($mysqli);
        $estado= $respuesta->fetch_all(MYSQLI_ASSOC);
        return $estado;
    }
    public function seguimientoAtencion($idPersonal)
    {
        $query = "SELECT
            r.idRproblema,
            r.descripcion,
            r.fechaRegistro,
            r.horaRegistro,
            (SELECT CONCAT(t.nomTrabajador, ' ', t.apeTrabajador)
                FROM probtrabajador pta
                JOIN trabajador t ON pta.idTrabajador = t.idTrabajador
                WHERE pta.idEstado = '2' AND pta.idRproblema = r.idRproblema
                ORDER BY pta.fechaCambio DESC, pta.horaCambio DESC
                LIMIT 1) AS enAtencionPor,
            (SELECT MAX(pta.fechaCambio)
                FROM probtrabajador pta
                WHERE pta.idEstado = '2' AND pta.idRproblema = r.idRproblema) AS fechaEnAtencion,
            (SELECT MAX(pta.horaCambio)
                FROM probtrabajador pta
                WHERE pta.idEstado = '2' AND pta.idRproblema = r.idRproblema) AS horaEnAtencion,
            (SELECT GROUP_CONCAT(CONCAT(t.nomTrabajador, ' ', t.apeTrabajador))
                FROM probtrabajador pta
                JOIN trabajador t ON pta.idTrabajador = t.idTrabajador
                WHERE pta.idEstado = '3' AND pta.idRproblema = r.idRproblema
                ORDER BY pta.fechaCambio DESC, pta.horaCambio DESC) AS atendidoPor,
            (SELECT MAX(pta.fechaCambio)
                FROM probtrabajador pta
                WHERE pta.idEstado = '3' AND pta.idRproblema = r.idRproblema) AS fechaAtendido,
            (SELECT MAX(pta.horaCambio)
                FROM probtrabajador pta
                WHERE pta.idEstado = '3' AND pta.idRproblema = r.idRproblema) AS horaAtendido
        FROM rproblema r
        WHERE r.idPersonal = '$idPersonal'
        AND r.idRproblema NOT IN (SELECT pta.idRproblema FROM probtrabajador pta
                                    JOIN conformidad c ON pta.idProbTrabajador = c.idProbTrabajador
                                    WHERE c.estado = '1' AND pta.idRproblema IS NOT NULL)
        ORDER BY r.idRproblema";
        $mysqli = $this->conecta();
        $respuesta = $mysqli->query($query);
        $this->desconecta($mysqli);
        $data = $respuesta->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    
    
}
?>