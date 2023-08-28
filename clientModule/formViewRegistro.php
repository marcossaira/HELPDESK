<?php session_start();
class formViewRegistro
{

    public function formViewRegistroShow($datos)
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
            <form id=formViewRegistro method='POST' action="../clientModule/getRegistro.php" enctype="multipart/form-data">
                <h1>REGISTRO DE PROBLEMA</h1>
                <table class="table">
                    <tr>
                        <td>EMPRESA:</td>
                        <td>
                            <?php
                            echo $_SESSION["Empresa"];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>SEDE:</td>
                        <td>
                            <?php
                            echo $_SESSION["Sede"];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Área</td>
                        <td>
                            <?php

                            echo $_SESSION['Area'] ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Personal</td>
                        <td>
                            <?php

                            echo $_SESSION['Personal'] ?>

                        </td>
                    </tr>
                    <tr>
                        <td>Descripcion</td>
                        <td>
                            <textarea name='descripcion' rows="5" cols="60"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Imagenes</td>
                        <td>
                            Elegir archivo:
                            <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>

                        </td>
                    </tr>
                    <tr>
                        <td>Tipo de Incidencia:</td>
                        <td>
                            <select id="id_incidencia" name="id_incidencia">
                                <option value="">-Seleccione-</option>
                                <?php
                                for ($i = 0; $i < count($datos); $i++) {
                                    ?>
                                    <option value="<?php echo $datos[$i]['idIncidencia'] ?>"><?php echo $datos[$i]['nomIncidencia'] ?></option>
                                <?php }
                                ?>
                            </select>
                        </td>
                    </tr>

                </table>
                <button type="submit" name="btnguardar" value="ok">GUARDAR</button>
            </form>
        </body>

        </html>
        <?php
    }
}
?>