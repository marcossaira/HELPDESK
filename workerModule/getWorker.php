<?php
if (isset($_POST['btnAtender'])) {
    include_once('controlWorker.php');
    $objControlWorker = new controlWorker();
    $objControlWorker -> atenderEspera();
} 
elseif (isset($_POST['btnVer'])) {
    include_once('controlWorker.php');
    $objControl = new controlView();
    $objControl -> listarEnEspera();
}
elseif (isset($_POST['btnModificar'])) {
    $idRproblema = $_POST["btnModificar"];
    include_once('controlWorker.php');
    $objControlWorker = new controlWorker();
    $objControlWorker->ponerEnAtencion($idRproblema);
   }
elseif (isset($_POST['btnAtendido'])) {
    $idRproblema = $_POST["btnAtendido"];
    $descripcion=$_POST['descripcion'];
    include_once('controlWorker.php');
    $objControlWorker = new controlWorker();
    $objControlWorker->ponerAtendido($idRproblema,$descripcion);
   }
elseif (isset($_POST['btnEnEspera'])) {
    $idRproblema = $_POST["btnEnEspera"];
    include_once('controlWorker.php');
    $objControlWorker = new controlWorker();
    $objControlWorker->ponerEnEspera($idRproblema);
   }

?>
