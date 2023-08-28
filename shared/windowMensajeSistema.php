<?php
 class windowMensajeSistema
 {
    public function windowMensajeSistemaShow($mensaje,$enlace)
    {
        ?>
        <html>
            <head>
                <title>Mensaje del sistema</title>
            </head>
            <body>
                <p align="center"> <strong> <?php echo strtoupper($mensaje); ?></strong></p>
                <p align="center"> <? echo $enlace; ?> </p>
            </body>
        </html>
        <?php
    }

 }
?>