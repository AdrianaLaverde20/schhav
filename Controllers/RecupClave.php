<?php 

// aca llamamos los archivos para la conexion a la base de datos y la clase de verificar user creo pues se supone
require_once  ("../Models/conexionDB.php");
require_once  ("../Models/VerificarUser.php");

// obtenemos el valor de las variables para alamcenarla aca y mandarla luego o algo asi y si, ! es control c y control v tampoco es que no tenga vida social y lo voy hacer hasta morir y esto va hacer asi con los demas codigos.
$email = $_POST['email'];
$clavel1 = $_POST['clave1'];
$clavel2 = $_POST['clave2'];

// creamos una instacia para mandar los valores de las variables para poder obtener el registro y poder verificar o eso dijo mi mama y ella no miente
$objconsultas= new LogUser();
$result = $objconsultas -> REcCLave($email, $clavel1, $clavel2);
   
?>