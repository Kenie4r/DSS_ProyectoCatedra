<?php
include '../controlador/queryRegister.php';
$usuario=$_POST['usuario'];
if (!empty($usuario) ) {
    $query=new QueryRegister;
   $resultado= $query->contarUsuarios($usuario);
   if ($resultado==true) { 
       echo "existe";
   }else {
       echo "no existe";
   }
  
}
?>