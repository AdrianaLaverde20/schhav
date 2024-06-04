<?php

session_start();

if (!isset($_SESSION['aut'])){

    echo "<script>alert('Por favoor inicie sesion, bobo hp ')</script>";
    echo "<script>location.href='../Extras/login.html'</script>";

}

if ($_SESSION['rol']!='Vendedor'){

    echo "<script>alert('su rol no tiene permisos  ')</script>";
    echo "<script>location.href='../Extras/login.html'</script>";

}



?>