<?php include "inicio.html"; ?>
<?php
if(isset($_POST["submit"])){
    $titulo=$_POST["titulo"];
    $autor=$_POST["autor"];
    $editorial=$_POST["editorial"];
    $insertar = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($insertar !== false){
        $imagen = $_FILES['imagen']['tmp_name'];
        $img = addslashes(file_get_contents($imagen));

        
        $host     = 'localhost';
        $usuario = 'root';
        $password = '';
        $basedatos = 'user';
        $puerto = '3310';
        
        $con = new mysqli($host, $usuario, $password, $basedatos, $puerto);

        if($con->connect_error){
            die("Connection failed: " . $con->connect_error);
        }
 
        $insercion = $con->query("INSERT into libros (titulo, autor, editorial, imagen) VALUES ('$titulo', '$autor', '$editorial', '$img')");
        if($insercion){
            echo "se a subido correctamente.";
        }else{
            echo "error al subir el archivo";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
    
}

echo "<center><h2>AÑADIR NUEVO LIBRO</h2></center>";
echo <<<_END
<html lang="en">
<head>
<title>REGISTRA TU EXPERIENCIA</title>
<link href="css/estiloinsertarss.css" rel="stylesheet" type="text/css"/> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form  action="insertar.php" method="post" enctype="multipart/form-data">
        titulo del libro:
        <input type="text" name="titulo"/>
        autor:
        <input type="text" name="autor"/>
        editorial:
        <input type="text" name="editorial"/>
        Select imagen to upload:
        <input type="file" name="imagen"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
</body>
</html>
_END;
?>