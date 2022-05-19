<html>
	<?php
		$personas=array();
		if ($_SERVER['REQUEST_METHOD']=="POST"){
			if (isset($_POST["guardar"])){
					
				$nombre=$_POST['nombre'];
				$apellido=$_POST['apellido'];
				$fecha_nacimiento=$_POST['fecha_nacimiento'];
				if ($nombre!="" && $apellido!="" && $fecha_nacimiento!=""){
					session_start();
					$persona = array("nombre" => $nombre, 
									  "apellido" => $apellido,
									  "fecha_nacimiento" => $fecha_nacimiento);
					if (empty($_SESSION["personas"])) {
						$i = 0;
						$_SESSION["personas"][$i] = $persona;
					} else {
						$i = count($_SESSION["personas"]);
						$i++;
						$_SESSION["personas"][$i] = $persona;
					}
				}
				$personas=$_SESSION["personas"];
			}else{
				session_start();
				session_unset();
				session_destroy();
				$personas=array();
			}
		}
	?>
 <head>
	<title>Tarea 05-05</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
	<h3>Datos de la persona</h3>
	<form action="formulario.php" method="POST">
		<label>Nombre:</label>
		<input type="text" name="nombre">
		<label>Apellido:</label>
		<input type="text" name="apellido">
		<label>Fecha Nacimiento:</label>
		<input type="date" name="fecha_nacimiento">
		<input type="submit" value="Guardar" name="guardar"/>
		
	</form>
	
	<h3>Tabla Personas</h3>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Fecha Nacimiento</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($personas as $persona) {?>
			    <tr>
					<td><?= $persona["nombre"]?></td>
					<td><?= $persona["apellido"]?></td>
					<td><?= $persona["fecha_nacimiento"]?></td>
				</tr>
			 <?php } ?>
		</tbody>
	</table>
	<form action="formulario.php" method="POST">
		<input type="submit" value="Vaciar Tabla" name="vacia-tabla"/>
	</form>
  </body>
</html>