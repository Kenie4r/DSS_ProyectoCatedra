<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Actualizar información del usuario</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
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


$menu = new HTMLMENU(2);
$form = new Formulario();
$tabla = new Table();



?>
    <div class="div-menu">
    <?php $menu->createMenu(); ?>
    </div>
	<br>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-offset-2 col-md-8">
					<h1>Actualizar datos del Usuario</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-offset-2 col-md-8">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<a href="index.php" class="btn btn-default">Regresar</a>	
				</div>
			</div>				
		</div>
	</div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <form action="update.php" method="POST">
<?php 
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
include 'connection.php';
$cn =  Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM usuario where idUsuario = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);	
echo '
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["idUsuario"].'" class="cod" readonly="readonly" name="idUsuario">
	</div>
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["Nombre"].'" placeholder="Nombre" name="nombre">
	</div>
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["Apellido"].'" placeholder="Apellido"  name="apellido">
	</div>
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["Password"].'" placeholder="Passwordseña"  name="Password">
	</div>
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["Genero"].'" placeholder="Genero"  name="genero">
	</div>
	<div>
		<label for="-">-</label>
		<input type="text" value="'.$data["Rolusuario"].'" placeholder="Tipo Usuario"  name="Tipo">
	</div>
';
Database::disconnect();
}	
?>
		<div>
			<input type="submit" class="btn btn-success" value="Actualizar">
		</div>
	    </form>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php 
if (!empty($_POST)) {
	include 'connection.php';
	$id = trim($_POST['idUsuario']);
	$nombre = trim($_POST['nombre']);
	$apellido = trim($_POST['apellido']);
	$Password = md5(trim($_POST['Password']));
	$genero = trim($_POST['genero']);
	$Tipo = trim($_POST['Tipo']);
	$cnu = Database::connect();
	$cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $cnu->prepare("UPDATE usuario SET Nombre = ?, Apellido = ?, Password = ?, genero = ?, Rolusuario = ? WHERE idUsuario = ?");
	$query->execute(array($nombre, $apellido, $Password, $genero, $Tipo, $id));
	Database::disconnect();
	header("Location: index.php");
}
?>
