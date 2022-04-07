<?php

function onlyAdmin(){
  session_start();
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }else{
    if($_SESSION['rol'] != "1"){
      header("location:../dashboard/index.php");
    }
  }
}

function onlyCreadores(){
  session_start();
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }else{
    if($_SESSION['rol'] == "u" || $_SESSION['rol'] == "3" ){
      header("location:../dashboard/index.php");
    }
  }
}

function existsSession(){
  session_start();
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }
}

function getRolSession(){
  session_start();
  $rol = "u";
  if(isset($_SESSION['username'])){
    $rol = $_SESSION['rol'];
  }
  return $rol;
}

?>