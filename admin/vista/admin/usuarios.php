<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /Practica4/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion de usuarios</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../diseños2.css">
    </head>
    <body>
        <?php
            include '../../../config/conexionBD.php';
            $codigo_admin = $_GET["codigo_admin"];
        ?>
        <nav>
            <ul>
                <li><a href="index.php?codigo_admin=<?php echo $codigo_admin ?>">Inicio</a></li>
                <li><a href="usuarios.php?codigo_admin=<?php echo $codigo_admin ?>">Usuarios</a></li>
                <li><a href="../../../config/cerrar_sesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <section class="info2">
            <?php
                $sqli ="SELECT usu_imagen,usu_nombres,usu_apellidos FROM usuario WHERE usu_codigo='$codigo_admin'";
                $stm = $conn->query($sqli);
                while ($datos = $stm->fetch_object()){
            ?>
                <p><?php echo $datos->usu_nombres." ".$datos->usu_apellidos ?></p>
                <img src="data:image/jpg; base64,<?php echo base64_encode($datos->usu_imagen) ?> " class="imgAdmin" >
            <?php   
                }
            ?>
        </section>
        <table id="buzon">
            <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th colspan="3">Accion</th>
            </tr>

            <?php

                $sql = "SELECT * FROM usuario WHERE rol_usu_codigo='2'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($row["usu_eliminado"]!='S'){
                            echo "<tr>";
                            echo "<td>" .$row["usu_cedula"]."</td>";
                            echo "<td>" .$row["usu_nombres"]."</td>";
                            echo "<td>" .$row["usu_apellidos"]."</td>";
                            echo "<td>" .$row["usu_direccion"]."</td>";
                            echo "<td>" .$row["usu_telefono"]."</td>";
                            echo "<td>" .$row["usu_correo"]."</td>";
                            echo "<td>" .$row["usu_fecha_nacimiento"]."</td>";
                            echo "<td class='accion'><a href='eliminar.php?codigo=".$row['usu_codigo']."&codigo_admin=".$codigo_admin."'>Eliminar</a></td>";
                            echo "<td class='accion'><a href='modificar.php?codigo=".$row['usu_codigo']."&codigo_admin=".$codigo_admin."'>Modificar</a></td>";
                            echo "<td class='accion'><a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']."&codigo_admin=".$codigo_admin."'>Cambiar contrasena</a></td>";
                        }
                    }
                }else{
                    echo "<tr>";
                    echo "<td colspan='7'>No existen usuarios registrados en el sistema</td>";
                    echo "</tr>";
                }
                $conn->close();
            ?>
        </table>
        <footer>
        <p> &#169; VASQUEZ FAJARDO FRANKLIN JOEL &nbsp; 05-2019</p>
        </footer>
    </body>
</html>