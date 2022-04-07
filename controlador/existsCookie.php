<?php

//Si existen las cookies
if (isset($_COOKIE['username']) ) {
    session_start();
    $_SESSION['username']=$_COOKIE['username'];
    $_SESSION['password']=$_COOKIE['password'];
    $_SESSION['rol']=$_COOKIE['rol'];
    header("location:../dashboard/index.php");
}

?>