<?php
if (!empty($_POST["btnguardar"])) {
    $descripcion = $_POST["descripcion"];
    $idIncidencia = $_POST["id_incidencia"];
    $target_dir = "../images/evidence/"; //directorio en el que se subira
    $uploadOk = 1; //se añade un valor determinado en 1
    $idImagenes = array(); // Un array para almacenar los nombres de las imágenes subidas
    $arrayImagenes = array();
    $imageUploaded = false; // Flag to track if at least one image is uploaded

    foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $tmp_name) {
        $name_File = basename($_FILES["fileToUpload"]["name"][$key]);
        $target_file = $target_dir . $name_File; // Corregimos la ubicación del archivo para cada iteración

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Comprueba si el archivo de imagen es una imagen real o una imagen falsa
        if (isset($_POST["submit"])) { //detecta el boton
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) { //si es falso es una imagen y si no lanza error
                echo "Archivo es una imagen- " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "El archivo no es una imagen";
                $uploadOk = 0;
            }
        }
        // Comprobar si el archivo ya existe
        $i = 1;
        $base_name = pathinfo($name_File, PATHINFO_FILENAME);
        while (file_exists($target_dir . $name_File)) {
            $name_File = $base_name . " (" . $i . ")." . $imageFileType;
            $i++;
        }
        $target_file = $target_dir . $name_File;
        // Comprueba el peso
        //if ($_FILES["fileToUpload"]["size"] > 5000000) {
        // echo "Perdon pero el archivo es muy pesado";
        //$uploadOk = 0;
        //}
        // Permitir ciertos formatos de archivo
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            $imageUploaded = true;
        }
    }
    
    //Comprueba si $uploadOk se establece en 0 por un error
    if ($imageUploaded) {
        foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $tmp_name) {
            $name_File = basename($_FILES["fileToUpload"]["name"][$key]);
            $target_file = $target_dir . $name_File; // Corregimos la ubicación del archivo para cada iteración

            // Move the uploaded image
            if (move_uploaded_file($tmp_name, $target_file)) {
                $arrayImagenes[] = $name_File;
            } else {
                echo "Error al cargar el archivo. Código de error: " . $_FILES["fileToUpload"]["error"][$key];
            }
        }
    } else {
        $arrayImagenes[] = "sin_imagen"; // Add "sin_imagen" only if no images are uploaded
    }

    include_once('controlCliente.php');
    $objControlCliente = new controlCliente();
    $objControlCliente->registro($descripcion, $idIncidencia, $arrayImagenes);

}
?>