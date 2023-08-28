<?php
class controlAutenticarUsuario
{

    public function validarDatos($login,$password)
    {
        include_once('../model/modeloUsuario.php');
        $objUsuario = new modeloUsuario();
        $userTable = $objUsuario -> verificarUsuario($login,$password);
       if($userTable=='trabajador')
       {
           include_once('../model/modeloUsuarioPrivilegio.php');
           include_once('windowBienvenidaSistema.php');
           $objWindowBienvenida = new windowBienvenidaSistema();
           $objPrivilegioUsuario = new modeloUsuarioPrivilegio();
           $listaPrivilegios = $objPrivilegioUsuario -> obtenerPrivilegios($login);
           $trabajador=$objUsuario->datosTrabajador($login,$password);
           print_r($trabajador);
           foreach($trabajador as $t){
            $idtrab=$t['idTrabajador'];
            $ntrab=$t['nomTrabajador'];
            $atrab=$t['apeTrabajador'];
            $dtrab=$t['dirTrabajador'];
            $ctrab=$t['cargoTrabajador'];
            $idusu=$t['idUsuario'];
           }
           session_start();
           $_SESSION['login'] = $login;
           $_SESSION['idTrabajador'] = $idtrab;
           $_SESSION['nomTrabajador'] = $ntrab;
           $_SESSION['apeTrabajador'] = $atrab;
           $_SESSION['dirTrabajador'] = $dtrab;
           $_SESSION['cargoTrabajador'] = $ctrab;
           $_SESSION['idUsuario'] = $idusu;
           $objWindowBienvenida -> WindowBienvenidaSistemaShow($listaPrivilegios);
       }
       else if($userTable=='personal')
       {    
           include_once('../model/modeloUsuarioPrivilegio.php');
           include_once('windowBienvenidaSistema.php');
           $objWindowBienvenida = new windowBienvenidaSistema();
           $objPrivilegioUsuario = new modeloUsuarioPrivilegio();
           $listaPrivilegios = $objPrivilegioUsuario -> obtenerPrivilegios($login);
           $personal=$objUsuario->datosPersonal($login,$password);
           foreach($personal as $p){
            $idpersonal=$p['idPersonal'];
            $npersonal=$p['nomPersonal'];
            $narea=$p['nomArea'];
            $nsede=$p['nomSede'];
            $nempresa=$p['nomEmpresa'];
           }
           session_start();
           $_SESSION['idPersonal'] = $idpersonal;
           $_SESSION['login'] = $login;
           $_SESSION['Personal'] = $npersonal;
           $_SESSION['Area']=$narea;
           $_SESSION['Sede']=$nsede;
           $_SESSION['Empresa']=$nempresa;
           
           $objWindowBienvenida -> WindowBienvenidaSistemaShow($listaPrivilegios);
       }
       else
       {
        include_once('../shared/windowMensajeSistema.php');
        $objMensaje = new windowMensajeSistema();
        $objMensaje -> windowMensajeSistemaShow("El usuario no se ha encontrado<br> el password no coincide, <br> o esta deshabilitado","<a href='../index.php'>ir al inicio</a>");
       }
    }
}
?>