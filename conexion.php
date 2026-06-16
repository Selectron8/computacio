<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    include("variables.php");
    $conexion=@mysqli_connect($servidor,$usuario,$contrasenha,$bd) or die("Problemas en la conexión.");
    echo "<p>Conexión satisfactoria</p>";
?>