<?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    header("Location: /Practicas/SistemaDeGestion1/public/vista/login.html");
?>