<?php
class controlView
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
    public function listarEnEspera()
    {
        include_once('../model/modeloRproblema.php');
        $objRproblema = new modeloRproblema();
        $respuesta = $objRproblema->listarRproblemaEnEspera();
        include_once('../adminModule/views/formViewEnEspera.php');
        $objFormTotal = new formViewEnEspera();
        $objFormTotal->formViewEnEsperaShow($respuesta);
    }

    public function listarEnAtencion()
    {
        include_once('../model/modeloRproblema.php');
        $objRproblema = new modeloRproblema();
        $respuesta = $objRproblema->listarRproblemaEnAtencion();
        include_once('../adminModule/views/formViewEnAtencion.php');
        $objFormTotal = new formViewEnAtencion();
        $objFormTotal->formViewEnAtencionShow($respuesta);
    }

    public function listarAtendidos()
    {
        include_once('../model/modeloProbTrabajador.php');
        $objModelProbTrabajador = new modeloProbTrabajador();
        $respuesta = $objModelProbTrabajador->listarAtenciones();
        include_once('../adminModule/views/formViewAtendidos.php');
        $objFormTotal = new formViewAtendidos();
        $objFormTotal->formViewAtendidosShow($respuesta);
    }

    public function listarSuspendidos()
    {
        include_once('../model/modeloRproblema.php');
        $objRproblema = new modeloRproblema();
        $respuesta = $objRproblema->listarRproblemaSuspendido();
        include_once('../adminModule/views/formViewSuspendido.php');
        $objFormTotal = new formViewSuspendido();
        $objFormTotal->formViewSuspendidoShow($respuesta);
    }
}
?>