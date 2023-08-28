<?php
class formViewTotal
{
    public function formViewTotalShow($datos, $estado)
    {
        ?>

        <!DOCTYPE html>
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
            <form id=formajax method='POST' action="../adminModule/getCambiodeEstado.php" enctype="multipart/form-data">

                <table>
                    <tr>
                        <td>
                            <h1>TODOS LOS REQUERIMIENTOS LISTADOS</h1>
                        </td>
                        <td><img src=imagenes/Cristian.webp width='100px' style='margin-left:250px'></td>

                    </tr>
                </table>
                <hr>
                <table class="table" style='margin-top:100px'>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Sede</th>
                            <th scope="col">Área</th>
                            <th scope="col">Personal</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Tipo de Error</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Cambiar Estado</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($datos); $i++) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $datos[$i]['idRproblema'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['nomEmpresa'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['nomSede'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['nomArea'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['nomPersonal'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['descripcion'] ?>
                                </td>
                                <td><a href='#'>Ver Imagenes Adjuntadas</a></td>
                                <td>
                                    <?php echo $datos[$i]['nomIncidencia'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['fechaRegistro'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['horaRegistro'] ?>
                                </td>
                                <td>
                                    <?php echo $datos[$i]['nomEstado'] ?>
                                </td>
                                <td>
                                    <select id="id_estado<?php echo $datos[$i]['idRproblema'] ?>" name="id_estado<?php echo $datos[$i]['idRproblema'] ?>">
                                        <?php
                                        for ($j = 0; $j < count($estado); $j++) {
                                            ?>
                                            <option value="<?php echo $estado[$j]['idEstado'] ?>"><?php echo $estado[$j]['nomEstado'] ?></option>
                                        <?php }
                                        ?>
                                    </select>

                                    <button type="submit" name="btnmodificar" value="<?php echo $datos[$i]['idRproblema'] ?>"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                </td>
                            </tr>

                            <?php
                        }
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