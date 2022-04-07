<?php

require_once('../controlador/session.php');
onlyCreadores(); //Solo el admin puede ver esto
$rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Ingresar nuevo usuario</title>
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


$menu = new HTMLMENU(2, $rol);
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
					<h1>Crear un nuevo usuario</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-offset-2 col-md-8">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<a href="index.php" class="btn btn-default">Retroceder</a>	
				</div>
			</div>				
		</div>
	</div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
		<form action="create.php" method="POST">
		<div class="form-group">
		        <label for="-">Usuario</label>
                <input type="text" class="form-control" placeholder="Nombre" name="Usuario" id="Usuario" />
            </div>
            <div class="form-group">
		        <label for="-">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" />
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" class="form-control" placeholder="Apellido" name="apellido" id="apellido" />
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="Password" placeholder="contraseña" name="password" id="password" />
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <select name="genero" id="genero" class="form-control">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="edad">Tipo De Usuario</label>
                <input type="text" class="form-control" placeholder="Tipo" name="tipo" id="tipo" />
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
		</form>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
<?php 
include 'connection.php';
if (!empty($_POST)) {
	$user = trim($_POST['Usuario']);
	$nombre = trim($_POST['nombre']);
	$apellido = trim($_POST['apellido']);
	$password = md5(trim($_POST['password']));
	$tipo = trim($_POST['tipo']);
	$genero = trim($_POST['genero']);
	$cn = Database::connect();
	$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $cn->prepare("INSERT INTO usuario(Username, Nombre, Apellido, Password,Rolusuario ,Genero) VALUES(?, ?, ?, ?, ?, ?)");
	$query->execute(array($user, $nombre, $apellido, $password, $tipo, $genero));
	Database::disconnect();
}	
?>
