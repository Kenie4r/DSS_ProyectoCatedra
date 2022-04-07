<?php
  require_once('../controlador/conection.php');
    require_once('../vista/dashboard_creator.php'); 
    require_once('../vista/menu_vista.php');
    require_once('../controlador/querys.php');
    require_once('../modelo/eventCard_generator.php'); 
    $page = new Dashboard();
    session_start();
    $rol = "u";
    if(isset($_SESSION['username'])){
      $rol = $_SESSION['rol'];
    }
    $page->createHeader(); 

    $page->createWebView($rol); 

    $page->allEvents();
    $page->createAllCategories();
    $page->endOfFile(); 
?>

