<?php
//Destruimos las cookies
setcookie("username", "", time()-60, "/");
setcookie("rol", "u", time()-60, "/");
//Destruimos la session
session_start();
session_destroy();
header("location:../dashboard/index.php");

?>