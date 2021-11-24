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
		
				//recibimos los datos del formulario
				$id = $_REQUEST['id'];
			
				//buscamos el dato en la BD
				$conexion = new mysqli("localhost","root","","tareas");
				if ($conexion->connect_errno) {
					echo "No se pudo conectar con la BD: " . $conexion->connect_errno;
					exit();
				}
				mysqli_set_charset($conexion, "utf8");

				$consulta = "SELECT * FROM tareas WHERE id = $id";

				$resultado = $conexion->query($consulta);

				$fila = $resultado->fetch_array(MYSQLI_ASSOC);

				//echo $fila['id'];
				//echo $fila['tarea'];

			?>
	
			<form action="guardar_tarea_editada.php" method="GET">
				
				<label for="tarea">Tarea</label>
				<input type="text" id="id" name="id" value="<?php echo $fila['id']?>">
				<input type="text" id="tarea" name="tarea" value="<?php echo $fila['tarea']?>" autofocus>
				<input type="submit" id="btn_guardar" value="Guardar">

			</form>
			
			<?php
				$resultado->close();
			?>
		</div>
	</body>
</html>
