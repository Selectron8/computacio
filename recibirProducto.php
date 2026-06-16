<?php
    // conectarse a la bd
    // mysqli_report(MYSQLI_REPORT_OFF | MYSQLI_REPORT_STRICT);
    // mysqli_report(MYSQLI_REPORT_OFF);
    // include("variables.php");
    // try{
    //     $conexion=mysqli_connect($servidor,$usuario,$contrasenha,$bd);
    //     echo "<p>Conexión satisfactoria</p>";

    //     mysqli_close($conexion);
    // }catch(mysqli_sql_exception $error){
    //     echo "<p>Problemas con la conexión</p>";
    //     echo $error->getMessage();
    // }
    // Recoger los datos del formulario
    $nombre=$_REQUEST['fnombre'];
    $descripcion=$_REQUEST['fdescripcion'];
    $precio=$_REQUEST['fprecio'];
    $cantidad=$_REQUEST['fcantidad'];
    include ("conexion.php");
    // insertará los datos en la tabla productos
    $sql="INSERT INTO productos (nombre,descripcion,precio,cantidad) VALUES ('$nombre','$descripcion','$precio','$cantidad')";
    // echo $sql;
    // $conexion=@mysqli_connect($servidor,$usuario,$contrasenha,$bd) or die("Problemas en la conexión.");
    // var_dump($conexion);
    // mysqli_query($conexion,$sql);
    $resultat = mysqli_query($conexion,$sql);
    if ($resultat) {
        echo "<p>Producte insertat correctament.</p>";
    }else{
        echo "<p>No se ha podido registrar.</p>";
    };
    mysqli_close($conexion);
    // try{
    //     $conexion=mysqli_connect($servidor,$usuario,$contrasenha,$bd);
    //     echo "<p>Conexión satisfactoria</p>";
    //     mysqli_query($conexion,$sql);
    //     mysqli_close($conexion);
    // }catch(mysqli_sql_exception $error){
    //     echo "<p>Problemas con la conexión</p>";
    //     echo $error->getMessage(); //objeto.metodo en php es objeto->método
    //         switch($error->getCode()){
    //                 case 1045:
    //                     echo "Error d'usuari o contrasenya";
    //                     break;
    //                 case 1049:
    //                     echo "La base de dades no existeix";
    //                     break;
    //                 case 1146:
    //                     echo "La taula no existeix";
    //                     break;
    //                 case 1062:
    //                     echo "Registre duplicat";
    //                     break;
    //                 default:
    //                     echo "Error: " . $error->getMessage();
    //             };
    // }


 
?>
