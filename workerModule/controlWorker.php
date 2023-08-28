<?php
class controlWorker
{
    public function listarTodo()
    {
        include_once('../model/modeloRproblema.php');
        
        $objRproblema = new modeloRproblema();
        $respuesta = $objRproblema->listarRproblema();

        include_once('../model/modeloEstado.php');

        $objModeloEstado= new modeloEstado();
        $estado = $objModeloEstado->listarEstado();

        include_once('../adminModule/views/formViewTotal.php');
        $objFormTotal = new formViewTotal();
        $objFormTotal->formViewTotalShow($respuesta,$estado);
    }
    public function atenderEspera()
    {
        include_once('../model/modeloRproblema.php');
        $objRproblema = new modeloRproblema();
        $respuesta = $objRproblema->listarRproblemaEnEspera();
        include_once('../workerModule/formViewListaEspera.php');
        $objFormViewListaEspera = new formViewListaEspera();
        $objFormViewListaEspera->formViewListaEsperaShow($respuesta);
    }
    public function ponerEnAtencion($idRproblema)
    {
        include_once('../model/modeloEstado.php');
        include_once('../model/modeloProbTrabajador.php');
        include_once('../model/modeloRproblema.php');
        include_once('../model/modeloImagen.php');
        include_once('../model/modeloUsuario.php');
        $objModelRproblema = new modeloRproblema;
        $objModelImagen = new modeloImagen;
        $objModelEstado = new modeloEstado;
        $objModelProbTrabajador= new modeloProbTrabajador;
        $objModelUsuario= new modeloUsuario;
        $objModelEstado->ponerEnAtencion($idRproblema);
        session_start();
        $idTrabajador=$_SESSION["idTrabajador"];
        $objModelProbTrabajador->registrarProbTrabajadorEnAtencion($idRproblema,$idTrabajador);
        $datosP=$objModelRproblema->listarUsuario($idRproblema);
        $images=$objModelImagen->listarImgX($idRproblema);
        include_once('../workerModule/formViewAtencion.php');
        $objFormViewAtencion= new formViewAtencion;
        $objFormViewAtencion->formViewAtencionShow($datosP,$images,$idRproblema);
    }

    public function ponerAtendido($idRproblema,$descripcion)
    {
        include_once('../model/modeloEstado.php');
        include_once('../model/modeloProbTrabajador.php');
        include_once('../model/modeloDescripcion.php');
        include_once('../model/modeloDescRproblema.php');
        $objModelEstado= new modeloEstado;
        $objModelProbTrabajador= new modeloProbTrabajador;
        $objModelDescripcion= new modeloDescripcion;
        $objModelDescRproblema= new modeloDescRproblema;
        $idDesc=$objModelDescripcion->registrarDescripcion($descripcion);
        $objModelDescRproblema->registrar($idRproblema,$idDesc);
        $objModelEstado->registroAtendido($idRproblema);
        session_start();
        $idTrabajador=$_SESSION["idTrabajador"];
        $objModelProbTrabajador->registrarProbTrabajadorAtendido($idRproblema,$idTrabajador);
    }
    public function ponerEnEspera($idRproblema)
    {
        include_once('../model/modeloEstado.php');
        include_once('../model/modeloProbTrabajador.php');
        $objModelEstado= new modeloEstado;
        $objModelProbTrabajador= new modeloProbTrabajador;
        $objModelEstado->registroEnEspera($idRproblema);
        session_start();
        $idTrabajador=$_SESSION["idTrabajador"];
        $objModelProbTrabajador->registrarProbTrabajadorEnEspera($idRproblema,$idTrabajador);
    }
}
?>