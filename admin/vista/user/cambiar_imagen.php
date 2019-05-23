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
        <title>Modificar Avatar</title>
        <link rel="stylesheet" rel="stylesheet" href="../../../diseños2.css">
    </head>
    <body class="bodyCreado">
        <?php
            $codigo = $_GET["codigo"];
        ?>
                    <form class="cajaCreado" method="POST" action="../../controladores/user/cambiar_imagen.php?codigo=<?php echo $codigo ?>" enctype="multipart/form-data">
                        <h3>Selecciona una imagen</h3>
                        <br>
                        <input type="file" name="txtImg">
                        <br>
                        <button class="botones" type="submit" name="aceptar">Aceptar</button>
                        <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick="location.href='micuenta.php?codigo=<?php echo $codigo ?>'" class="botones">
                    </form>
    </body>
</html>
