<?php

	$host = "localhost"; 		// Servidor
	$basededatos = "agenda";	// Base de datos
	$usuariodb = "root";    	// Usuario
	$clavedb = "";  			// Password
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
	
	//Evaluamos si la conexión fue exitosa
	if ($conexion->connect_errno) {
		echo "No se pudo conectar con la Base de Datos, código de error: " . $conexion->connect_errno;
		exit();
	}else{
		//echo "Conexión exitosa";
	}
	
?>