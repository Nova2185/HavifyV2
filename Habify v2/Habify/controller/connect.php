<?php
function agregar($u, $p){
    $c = mysqli_connect("localhost", "root", "avoc_ADO18", "productos13_v2");

    if($c){
        $strI = "insert into usuarios(user, password) values('".$u."', '".$p."');";
        mysqli_query($c, $strI);
    }

    else{
        echo "No se pudo conectar";
    }

    mysqli_close($c);

}

if(isset($_POST["txtUsuario"]))
    agregar($_POST["txtUsuario"], $_POST["txtPassword"]);

?>