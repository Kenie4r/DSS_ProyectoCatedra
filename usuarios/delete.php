
<?php 
if (!empty($_GET)) {
//echo $_GET['id'];
include 'connection.php';	
$cn =  Database::connect();
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$query = $cn->prepare("DELETE FROM usuario where idUsuario = ?");
$query->execute(array($_GET['id']));
header("Location: index.php");
}

?>