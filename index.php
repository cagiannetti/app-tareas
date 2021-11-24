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
			// conexión a la BD
			$conexion = new mysqli("localhost","root","","tareas");
			
			if ($conexion->connect_errno) {
				//Evaluamos si la conexión fue exitosa
				echo "No se pudo conectar con la Base de Datos, código de error: " . $conexion->connect_errno;
				exit();
			}else{
				//echo "Conexión exitosa";
			}
			
			mysqli_set_charset($conexion, "utf8");

			$consulta = "SELECT	* FROM tareas";

			$resultado = $conexion->query($consulta);

			if ($resultado) {
				
				echo "<ul>";
				while ($fila = $resultado->fetch_array(MYSQLI_ASSOC)) {
					echo "<li>";
					//echo $fila['id'];
					echo $fila['tarea'];
					echo " <a href='borrar_tarea.php?id=" . $fila['id'] . "'>borrar</a>";
					echo " | ";
				echo " <a href='editar_tarea.php?id=" . $fila['id'] . "'>editar</a>";
					echo "</li>";	
				}
				echo "</ul>";
				
				//echo "Total: " . $resultado->num_rows . " tareas";
			
			}else{				
		
				echo "Error en la consulta SQL";
				exit();
			
			};

			//Liberar los resultados de la memoria
			$resultado->close();
		?>	
		<a href="nueva_tarea.php">Crear nueva tarea</a>
	</div>
	</body>
</html>
