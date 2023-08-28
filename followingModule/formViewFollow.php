<?php
class formViewFollow
{
    public function formViewFollowShow($datos)
    {
        ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>SISTEMA DE ATENCION</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        </head>
        <body>
            <form id=formViewFollow method='POST' action="../followingModule/getFollow.php" enctype="multipart/form-data">
                <h1>ESTADO DE SOLICITUDES</h1>
                <table class="table">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Requerimiento</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Hora Registro</th>
                    <th scope="col">En Atencion Por</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Hora Inicio</th>
                    <th scope="col">Atendido Por</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Hora Fin</th>
                    <th scope="col">Conforme</th>
                </tr>
                <?php
                    for ($i = 0; $i < count($datos); $i++) {
                    ?>
                <tr>
                    <td>
                        <?php echo $datos[$i]['idRproblema'] ?>
                    </td>
                    <td>
                        <?php echo $datos[$i]['descripcion'] ?>
                    </td>
                    <td>
                        <?php 
                        $fechaRegistro=$datos[$i]['fechaRegistro'];
                        $fechaDateTime = new DateTime($fechaRegistro);
                        $fechaFormateada = $fechaDateTime->format("d/m/Y");
                        echo $fechaFormateada; ?>
                    </td>
                    <td>
                        <?php echo $datos[$i]['horaRegistro'] ?>
                    </td>
                    <td>
                        <?php echo ($datos[$i]['enAtencionPor'] !== null) ? $datos[$i]['enAtencionPor'] : "Por Designar" ?>
                    </td>
                    <td>
                    <?php if ($datos[$i]['fechaEnAtencion'] !== null) {
                                    $fechaEnAtencion=$datos[$i]['fechaEnAtencion'];
                                    $fechaDateTime = new DateTime($fechaEnAtencion);
                                    $fechaFormateada = $fechaDateTime->format("d/m/Y");
                                } else {
                                    $fechaFormateada = "- -";
                                }   
                                echo $fechaFormateada; ?>
                    </td>
                    <td>
                        <?php echo ($datos[$i]['horaEnAtencion'] !== null) ? $datos[$i]['horaEnAtencion'] : "- -" ?>
                    </td>
                    <td>
                        <?php echo ($datos[$i]['atendidoPor'] !== null) ? $datos[$i]['atendidoPor'] : "- -" ?>
                    </td>
                    <td>
                        <?php if ($datos[$i]['fechaAtendido'] !== null){
                            $fechaAtendido=$datos[$i]['fechaAtendido'];
                            $fechaDateTime = new DateTime($fechaAtendido);
                            $fechaFormateada=$fechaDateTime->format("d/m/Y");
                        }else{
                            $fechaFormateada='- -';
                        }
                        echo $fechaFormateada;
                        ?>
                    </td>
                    <td>
                        <?php echo ($datos[$i]['horaAtendido'] !== null) ? $datos[$i]['horaAtendido'] : "- -" ?>
                    </td> 
                    <td>
                    <button type="submit" name="btnConforme" value="<?php echo $datos[$i]['idRproblema'] ?>">Conforme<i
                    class="fa-solid fa-pen-to-square"></i></button>
                    </td>
                    <td>
                    <button type="submit" name="btnNoConforme" value="<?php echo $datos[$i]['idRproblema'] ?>">No Conforme<i
                    class="fa-solid fa-pen-to-square"></i></button>
                    </td>
                </tr>
                <?php }
                ?>
                </table>
                
            </form>
        </body>
        </html>
        <?php
    }
}
?>