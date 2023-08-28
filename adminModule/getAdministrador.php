<?php
if (isset($_POST['btnTotal'])) {
    include_once('controlView.php');
    $objControl = new controlView();
    $objControl -> listarTodo();
} 
elseif (isset($_POST['btnEnespera'])) {
    include_once('controlView.php');
    $objControl = new controlView();
    $objControl -> listarEnEspera();

}
elseif (isset($_POST['btnEnAtencion'])) {
    include_once('controlView.php');
    $objControl = new controlView();
    $objControl -> listarEnAtencion();
}
elseif (isset($_POST['btnAtendidos'])) {
    include_once('controlView.php');
    $objControl = new controlView();
    $objControl -> listarAtendidos();
}
elseif (isset($_POST['btnSuspendidos'])) {
    include_once('controlView.php');
    $objControl = new controlView();
    $objControl -> listarSuspendidos();
}

?>
