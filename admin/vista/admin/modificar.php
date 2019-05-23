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
        <title>Modificar datos de persona</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../diseños2.css">
    </head>
    <h1>MODIFICAR</h1>
    <body class="bodyCreado">
        <?php
            $codigo_admin = $_GET["codigo_admin"];
            $codigo = $_GET["codigo"];
            $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

            include '../../../config/conexionBD.php';
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
        ?>
                    <form class="cajaCreado" method="POST" action="../../controladores/admin/modificar.php?codigo_admin=<?php echo $codigo_admin ?>">
                        <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">

                        <label class="modifica" for="cedula">Cedula (*)</label>
                        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required_placeholder="Ingrese la cedula...">
                        <br>

                        <label class="modifica" for="nombres">Nombres (*)</label>
                        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required_placeholder="Ingrese los dos nombres...">
                        <br>

                        <label class="modifica" for="apellidos">Apellidos (*)</label>
                        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required_placeholder="Ingrese los dos apellidos...">
                        <br>

                        <label class="modifica" for="direccion">Direccion (*)</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required_placeholder="Ingrese los direccion...">
                        <br>

                        <label class="modifica" for="telefono">Telefono (*)</label>
                        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required_placeholder="Ingrese el telefono...">
                        <br>

                        <label class="modifica3" for="fecha">Fecha Nacimiento (*)</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required_placeholder="Ingrese la fecha de nacimiento...">
                        <br>

                        <label class="modifica2" for="correo">Correo electronico (*)</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required_placeholder="Ingrese el correo electronico...">
                        <br>

                        <input class="botones" type="submit" id="modificar" name="modificar" value="Modificar">
                        <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='usuarios.php?codigo_admin=<?php echo $codigo_admin ?>'" class="botones">
                    </form>
        <?php            
                }
            }else{
                echo "<p>Ha ocurrido un error inesperdado</p>";
                echo "<p>".mysqli_error($conn)."</p>";
            }
            $conn->close();
        ?>
    </body>
</html>