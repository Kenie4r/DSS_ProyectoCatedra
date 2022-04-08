<?php

require_once('../controlador/session.php');
onlyCreadores(); //Solo el admin puede ver esto
$rol = getRolSession(); //Se obtiene el rol

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
</head>
<body>
<?php

require_once('../vista/menu_vista.php');
require_once('../modelo/form.class.php');
require_once('../modelo/table.class.php');


$menu = new HTMLMENU(2, $rol);
$form = new Formulario();
$tabla = new Table();



?>
    <?php $menu->createMenu(); ?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-offset-2 col-md-8">
					<h1>Usuarios:</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-offset-2 col-md-8">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<a href="create.php" class="btn btn-primary">Crear Nuevo Usuario</a>	
					
				</div>
			</div>				
		</div>
	</div>
	<br>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
			<table class="table table-bordered">
				<thead >
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Apellido</th>
						<th class="text-center">Rol</th>
						<th class="text-center">Operaciones</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					
						include 'connection.php';
						$pdocn = Database::connect();
						$sql = ('SELECT * FROM usuario ORDER BY idUsuario ASC');
						foreach ($pdocn->query($sql) as $row) {
						//Elegimos rol
						switch ($row['Rolusuario']) {
							case 1:
								$rolU = "Administrador";
								break;
							case 2:
								$rolU = "Creador";
								break;
							case 3:
								$rolU = "Visitante";
								break;
						}
						//
						echo 	'<tr>
									<td class="text-center">'.$row["idUsuario"].'</td>
									<td class="text-center">'.$row["Username"].'</td>
									<td class="text-center">'.$row["Nombre"].'</td>
									<td class="text-center">'.$row["Apellido"].'</td>
									<td class="text-center">'.$rolU.'</td>
									<td class="text-center">
										<a href="read.php?id='.$row["idUsuario"].'" class="btn btn-default">Obtener</a>											
										<a href="update.php?id='.$row["idUsuario"].'" class="btn btn-success">Modificar</a>
										<a href="confirmacion.php?id='.$row["idUsuario"].'" class="btn btn-danger">Eliminar</a>										
									</td>
								</tr>';
						}
					 ?>						
				</tbody>
			</table>		
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
