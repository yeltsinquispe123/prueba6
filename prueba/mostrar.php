<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Imagenes</title>
</head>
<body>
<?php include "inicio.html"; ?>
    <h2>lista de libros</h2>
    <center>
        <table border="2">
            <thead>
               <tr>
                   <th>id</th>
                   <th>Titulo</th>
                   <th>autor</th>
                   <th>editorial</th>
                   <th>imagen</th>
                   <th>Acción</th>
               </tr> 
            </thead>
            <tbody>
                <?php
                    $host     = 'localhost';
                    $usuario = 'root';
                    $password = '';
                    $basedatos  = 'user';
                    $puerto = '3310';

                    $db = new mysqli($host, $usuario, $password, $basedatos, $puerto);

                    $query="SELECT * FROM libros";
                    $resultado=$db->query($query);
                    while($row=$resultado->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['autor']; ?></td>
                            <td><?php echo $row['editorial']; ?></td>
                            <td>
                            <img width = "200 px"; src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/>
                            </td>
                            <td href="#">MODIFICAR</td>
                            <td href="#">ELIMINAR</td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </center>
</body>
</html>