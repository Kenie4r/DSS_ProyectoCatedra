<?php
  require_once('../controlador/conection.php');
    require_once('../vista/dashboard_creator.php'); 
    require_once('../vista/menu_vista.php');
    require_once('../controlador/querys.php');
    require_once('../modelo/eventCard_generator.php'); 
    $page = new Dashboard(); 
    $page->createHeader(); 

    $page->createWebView(); 

    $page->allEvents();
    $page->createAllCategories();
    $page->endOfFile(); 
?>

