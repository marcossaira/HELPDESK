<?php
class formViewWorker
{
    public function formViewWorkerShow()
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
            <form name='formViewWorker' method='POST' action="../workerModule/getWorker.php">
                <h1>BIENVENIDO
                    <?php
                    ?>
                </h1>
                <table>
                    <tr>
                        <td><input name='btnAtender' type='submit' value='ATENDER SOLICITUDES'></td>
                    </tr>
                    <tr>
                        <td><input name='btnVer' type='submit' value='VER SOLICITUDES ATENDIDAS'></td>
                    </tr>
                  
                </table>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        </body>

        </html>
        <?php
    }
}
?>