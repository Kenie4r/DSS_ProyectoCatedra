<?php
session_start();

function onlyAdmin(){
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }else{
    if($_SESSION['rol'] != "1"){
      header("location:../dashboard/index.php");
    }
  }
}

function onlyCreadores(){
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }else{
    if($_SESSION['rol'] == "u" || $_SESSION['rol'] == "3" ){
      header("location:../dashboard/index.php");
    }
  }
}

function existsSession(){
  if(!isset($_SESSION['username'])){
    header("location:../dashboard/index.php");
  }
}

function getRolSession(){
  $rol = "u";
  if(isset($_SESSION['username'])){
    $rol = $_SESSION['rol'];
  }
  return $rol;
}

?>