<?php
	
	session_start();

	function agregar($n, $e, $c){
        $conn = mysqli_connect("localhost", "root", "avoc_ADO18", "habify_final");

        if($conn){
            $strI = "insert into Usuarios(Nombre, Email, Contraseña) values('".$n."','".$e."','".$c."');";
            $r = mysqli_query($conn, $strI);
        }

        else{
            echo "No se pudo conectar";
        }

        mysqli_close($conn);
    }

    if(isset($_POST["crearNombre"]) && isset($_POST["crearEmail"]) && isset($_POST["crearContrasena"])){
        $nombre = $_POST["crearNombre"];
        $email = $_POST["crearEmail"];
        $contrasena = $_POST["crearContrasena"];
        agregar($nombre, $email, $contrasena);
    }


    function validar($e, $c) {
		$conn = mysqli_connect("localhost", "root", "avoc_ADO18", "habify_final");
	
		if ($conn) {
			$strQ = "SELECT count(*) as existe FROM Usuarios WHERE Email='$e' AND Contraseña='$c';";
			$r = $conn->query($strQ);
	
			if ($r->num_rows > 0) {
				$qn = "SELECT Nombre FROM usuarios WHERE Email='$e' AND Contraseña='$c';";
				$qid = "SELECT Id FROM usuarios WHERE Email='$e' AND Contraseña='$c';";
				$nom = $conn->query($qn);
				$id = $conn->query($qid);
	
				while ($u = $nom->fetch_assoc()) {
					$_SESSION["nombre"] = $u["Nombre"];
				}
	
				while ($a = $id->fetch_assoc()) {
					$_SESSION["id"] = $a["Id"];
				}
	
				header("Location: http://localhost/Prog_Web/Habify v1.5/Habify/assets/HabifyHomeScreen/index.php");
				exit();
			}
		} else {
			echo "No se pudo conectar a la base de datos";
		}
	
		mysqli_close($conn);
	}//Fin función validar

    if(isset($_POST["Email"]) && isset($_POST["Contrasena"])){
        $email = $_POST["Email"];
        $contraseña = $_POST["Contrasena"];
        validar($email, $contraseña);
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>