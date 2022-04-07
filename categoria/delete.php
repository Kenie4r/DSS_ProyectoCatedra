<?php
require_once('../vista/menu_vista.php');
require_once('../controlador/session.php');
onlyCreadores(); //Solo creadores y admins pueden ver esto
$rol = getRolSession(); //Todos pueden verlo pero solo algunas opciones estaran para los especiales

$menu = new HTMLMENU(2, $rol);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Actualizar información del usuario con PDO</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/update.css">

</head>
<body>
<?php $menu->createMenu(); ?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-offset-2 col-md-8">
					<h1>Actualizar</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-offset-2 col-md-8">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<a href="index.php" class="btn btn-default">Back</a>	
				</div>
			</div>				
		</div>
	</div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
        <form action="delete.php" class="form" method="POST">
<?php 
$id=null;
if (!empty($_GET)) {
$id=$_GET['id'];
include 'conupdate.php';
$cn =  Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("SELECT * FROM categoria where idCategoria = ?");
$query->execute(array($_GET['id']));
$data = $query->fetch(PDO::FETCH_ASSOC);	
echo '
<div>
	<div>
		<input type="text" value="'.$data["idCategoria"].'" class="form__field" readonly="readonly" name="idCategoria">
        <br><label for="-">ID a eliminar</label><br>
	</div>
	<div>
		<input type="text" value="'.$data["Titulo"].'" class="titu" placeholder="Nombre cuenta" readonly="readonly" name="Titulo">
        <br><label for="-">Titulo a eliminar</label><br>
	</div>
	<div>
		<input type="textarea" value="'.$data["Descripcion"].'" cols="30" rows="20" class="descrip" placeholder="Descripcion" readonly="readonly"  name="Descripcion">
        <br><label for="-">Descripcion a eliminar</label><br>
    </div>
</div>
';
Database::disconnect();
}	
?>
		<div>
			<input type="submit" class="btn" value="Eliminar">
		</div>
	    </form>
        </div>
    </div>
</div>
</body>
</html>
<?php 
if (!empty($_POST)) {
	include 'conupdate.php';
	$id = trim($_POST['idCategoria']);
	$cnu = Database::connect();
	$cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $cnu->prepare("DELETE FROM categoria where idCategoria = ?");
	$query->execute(array($id));
	Database::disconnect();
	header("Location: index.php");
}
?>
