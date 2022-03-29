<?php
    $idEvento = $_GET['idEvento']; 

    //vamos a leer todo lo que tiene que ver con los eventos
    require_once('../controlador/conection.php'); 
    require_once('../controlador/querys.php'); 

    require_once('../vista/eventReader_creator.php'); 
    require('../vista/menu_vista.php'); 
    $menu = new HTMLMENU(2); 
    $page = new EventsPage(); 
    $page->createHeader(); 
    $menu->createMenu(); 
    $page->GenerateCard($idEvento); 


?>