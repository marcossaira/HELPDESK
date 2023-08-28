<?php
class formViewAdministrador
{
  public function formViewAdministradorShow() 
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
    <form name='formViewAdministrador' method='POST' action="../adminModule/getAdministrador.php" >
        <h1>BIENVENIDO <?php

        ?>
        </h1>
        <table>
            <tr>
                <td><input name='btnTotal' type='submit' value='VISTA GENERAL DE REQUERIMIENTOS' ></td>
            </tr>
            <tr>
            <td><input name='btnEnespera'type='submit' value='REQUERIMIENTOS EN ESPERA'></td>
            <tr>
                <td><input name='btnEnAtencion'type='submit' value='REQUERIMIENTOS EN ATENCIÓN'></td>
            </tr>
            <tr>
                <td><input name='btnAtendidos'type='submit' value='REQUERIMIENTOS ATENDIDOS'></td>
            </tr>
            <tr>
                <td><input name='btnSuspendidos'type='submit' value='REQUERIMIENTOS SUSPENDIDOS'></td>
            </tr>

        </table>
</body>

</html>
<?php
  }
}
?>