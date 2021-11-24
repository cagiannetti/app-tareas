<!DOCTYPE html> 
<html lang="es">
	<head>
		<title>clases PHP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="estilos.css" />

	</head>
	
	<body>
	<div id="contenedor">
		<?php
			//recibimos los datos
			$tarea = $_REQUEST['tarea'];
				
			// conexión a la BD
			$conexion = new mysqli("localhost","root","","tareas");
			if ($conexion->connect_errno) {
				//Evaluamos si la conexión fue exitosa
				echo "No se pudo conectar con la Base de Datos, código de error: " . $conexion->connect_errno;
				exit();
			}
			mysqli_set_charset($conexion, "utf8");
			
			//ejecutamos la consulta
			$consulta="INSERT INTO tareas (tarea) VALUES ('$tarea')";
			$conexion->query($consulta);
			
			echo "Dato insertado: $tarea";
			
		?>	
		<a href="index.php">inicio</a>
	</div>
	</body>
</html>
