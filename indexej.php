
<link rel="stylesheet" type="text/css" href="style.css"><?php
include("conexion.php");

if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $sql = "DELETE FROM alumnos WHERE id=$id";
    mysqli_query($conexion, $sql);
}




$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html>
<div style="text-align: center;">
  <img src="uniqua.jfif" width="100" height="100">
</div>

    <title>CRUD de calificaciones</title>
</head>
 <style>
        body {
            background-image: url('uniqua.jfif');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

<body>
 <h1 style="text-align: center;">CRUD de calificaciones</h1>    

    <h2 style="text-align: center;">Lista de alumnos</h2>    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Parcial 1</th>
                <th>Parcial 2</th>
                <th>Parcial 3</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["parcial_1"] . "</td>";
                echo "<td>" . $fila["parcial_2"] . "</td>";
                echo "<td>" . $fila["parcial_3"] . "</td>";
                echo "<td>" . $fila["promedio"] . "</td>";
                  echo "<td>";
                echo "<a href='editar.php?id=" . $fila['id'] . "'>Editar</a>";
                echo " | ";
                echo "<a href='eliminar.php?id=" . $fila['id'] . "'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            

        </tbody>    
    </table>
 <a href="nuevo_alumno.php"><button style="background-color: #A43A62;">Agregar alumno</button></a>


   
</body>
</html>
