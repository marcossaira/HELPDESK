<?php
class formViewAtencion
{
    public function formViewAtencionShow($datos,$img,$idRproblema)
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
            <script src="https://kit.fontawesome.com/d72132bb23.js" crossorigin="anonymous"></script>
        </head>

        <body>
            <form name='formViewAtencion' enctype="multipart/form-data" method='POST' action="../workerModule/getWorker.php">
                <table>
                    <tr>
                        <td>
                            <h1>FORMULARIO DE ATENCION</h1>
                        </td>
                        <td><img src=imagenes/Cristian.webp width='100px' style='margin-left:250px'></td>
                    </tr>
                </table>
                <hr>
                <table class="table" style='margin-top:100px'>
                    <?php for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        <tr>
                            <td>EMPRESA:</td>
                            <td>
                                <?php echo $datos[$i]['nomEmpresa'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>SEDE:</td>
                            <td>
                                <?php echo $datos[$i]['nomSede'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Área</td>
                            <td>
                                <?php echo $datos[$i]['nomArea'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Personal</td>
                            <td>
                                <?php echo $datos[$i]['nomPersonal'] ?>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td>
                                <?php echo $datos[$i]['descripcion'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagenes</td>
                            <td><?php for ($j = 0; $j < count($img); $j++) {
                                    ?>
                               
                                    <img src='../images/evidence/<?php echo $img[$j]['nomImagen'] ?>' width=70px>
                                
                                <?php
                                } ?>
                                </td>
                        </tr>
                        <tr>
                            <td>Tipo de Equipo</td>
                            <td>
                                <?php echo $datos[$i]['nomTipoEquipo'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>ACCESOS REMOTOS:</td>
                            <td>
                            <ul>
                               <li> ANYDESK: <?php echo $datos[$i]['numeroAnydesk'] ?></li>
                               <li> TEAM VIEWER:  <?php echo $datos[$i]['numeroTeamViewer'] ?></li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Descripcion de los Procesos:</td>
                            <td><textarea name='descripcion' rows="5" cols="60"></textarea></td>
                        </tr>
                        <tr>
                        <td>
                            <button type="submit" name="btnAtendido" value= <?php echo $idRproblema ?> >ATENDIDO<i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="submit" name="btnEnEspera" value= <?php echo $idRproblema ?> >PONER EN ESPERA<i
                                    class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
            </form>
        </body>
        </html>
        <?php
    }
}
?>