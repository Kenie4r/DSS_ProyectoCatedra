<?php
class EventsPage{
    public function createHeader(){
        $header = <<<EOD
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>All Star | Evento</title>
            <link rel="stylesheet" href="../css/menu.style.css">
            <link rel="stylesheet" href="../css/icomoon/style.css">
            <link rel="stylesheet" href="../css/style-readEvent.css">
        </head>
        <body>
        EOD;
        echo $header; 
    }
    public function GenerateCard($idEvento){
        $db = new Query(); 
        $evento = $db->getEventByID($idEvento); 
        $userC = $db->howManyUserinEvent($idEvento);
        if(is_bool($evento) or count($evento)==0){
            header("Location:../dashboard/index.php"); 
        }
        if(is_bool($userC)){
            $userCount = 0; 
        }else{
            $userCount = $userC['COUNT(idUsuario)']; 
        }
        if($userCount == $evento['MaximoPersonas']){
            $btn = "<input type='submit' value='El evento ya está lleno' name='save' disabled>"; 
        }else{
            $btn = "<input type='submit' value='Unirse' name='save'>"; 
        }
        $card = <<<AOD
        <section class="sect-d">
            <article class="form">
                <div class="event-name">
                    {$evento['Titulo']}
                </div>
                <div class="grid">
                    <div class="join-sec">
                        <div class="cantidad">
                            <small>personas que irán</small>
                            <h2>{$userCount}/{$evento['MaximoPersonas']}</h2>
                            
                        </div>
                        <form action="../modelo/saveConfirmation.php" method="post" class="btn-unir">
                            <input name='idUser' type='hidden' value='1'>
                            <input type='hidden' value='{$idEvento}' name='eventID'>
                            {$btn}
                        </form>
                    </div>
            
                    <div class="info">
                        <div class="descr">
                            <h2>Descripción de evento</h2>
                            <p>
                            {$evento['Descripcion']}
                            </p> 
                        </div>
                        <div class="fechas">
                            <div class="fecha">
                                <h4>Facha inicial</h4>
                                <p>{$evento['FechaInicio']}</p>
                            </div>
                            <div class="fecha">
                                <h4>Fecha final</h4>
                                <p>{$evento['FechaFin']}</p>
                            </div>
                        </div>
                        <div class="tags">
                            <div class="tag">
                                <a href="">
                                    ROCK
                                </a>
                            </div>
                            <div class="tag">
                            </div>
                            <div class="tag">
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section> 
        AOD; 
        echo $card; 
    }



}



?>