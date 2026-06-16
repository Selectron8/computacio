<?php
mysqli_report(MYSQLI_REPORT_OFF | MYSQLI_REPORT_STRICT);
include("variables.php");
try{
    $conexion=mysqli_connect($servidor,$usuario,$contrasenha,$bd);
    echo "<p>Conexión satisfactoria</p>";
    mysqli_close($conexion);
}catch(mysqli_sql_exception $error){
    echo "<p>Problemas con la conexión</p>";
    echo $error->getMessage(); //objeto.metodo en php es objeto->método
}

?>
