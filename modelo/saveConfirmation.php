<?php
    require_once("../controlador/conection.php"); 
    require_once("../controlador/querys.php"); 

    if(isset($_GET['option'])){
        $idUsuario = $_POST['user']; 
        $idEvento = $_POST['event']; 
        $dbHandler = new Query(); 
        switch($_GET['option']){
            case 's': 
              
                if($dbHandler->InsertEventUserC($idUsuario, $idEvento,"Espera")){
                    echo "Te has inscrito de manera correcta"; 
                }else{
                    echo "No se se te pudo inscribir, vuelvel a intentarlo de nuevo más tarde"; 
                }

                break; 
            case 'c':
                if($dbHandler->UpdateEventAndUserC($idUsuario, $idEvento)){
                    echo "Has confirmado  de manera correcta tu asistencia"; 
                }else{
                    echo "Ha sucedido algo, vuelve a intentarlo más tarde"; 

                }
                break;
            case 'c2': 
                if($dbHandler->SetEventAndUserConfirmed($idUsuario, $idEvento)){
                    echo "Has confirmado  de manera correcta tu asistencia"; 
                }else{
                    echo "Ha sucedido algo, vuelve a intentarlo más tarde"; 

                }
                break;  
            case 'e': 
                if($dbHandler->deleteEventAndUserC($idUsuario, $idEvento)){
                    echo "Has cancelado de manera correcta tu asistencia"; 
                }else{
                    echo "Ha sucedido algo, vuelve a intentarlo más tarde"; 

                }
                break; 
        }
       
    }else{
        echo "Ha ocurrido un error, porfavor regrese al inicio"; 
    }

     
?>