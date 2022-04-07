<?php
  require_once('../controlador/conection.php');
    require_once('../vista/dashboard_creator.php'); 
    require_once('../vista/menu_vista.php');
    require_once('../controlador/querys.php');
    require_once('../modelo/eventCard_generator.php');
    require_once('../controlador/session.php');
    existsCookies(); //Verificar si existen cookies
    $rol = getRolSession(); //Puede ser vista por todos, pero las opciones especiales solo para admin o creadores
    $page = new Dashboard();
    $page->createHeader(); 

    $page->createWebView($rol); 

    $page->allEvents();
    $page->createAllCategories();
    $page->endOfFile(); 
?>

