    <?php
        class Dashboard{
            public function __construct()
            {
                
            } 
            public function createHeader(){
                $header= <<<EOD
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>All Star | Dashboard</title>
                    <link rel="stylesheet" href="../css/menu.style.css">
                    <link rel="stylesheet" href="../css/icomoon/style.css">
                    <link rel="stylesheet" href="../css/dashboard.css">
                </head>
                EOD; 

                echo $header; 
            }

            public function createWebView(){
                $menu = new HTMLMENU(0);

                $view  =<<<EOD
                <body>
                {$menu->createMenu()}
                <section class="webface">
                      <div class="bg">
                      </div>
                      <div class="textos-face">
                          <h1>ALL STAR <span class="icon-star"></span></h1>
                          <h3><small>
                              Brilla en tu eventos
                          </small></h3>
                      </div>
                  </section>
                EOD; 

                echo $view; 
            }
            public function allEvents(){

                echo "    <section class='events-div'>
                <article class='newEvents'>";
                //creación de las tarjetas de html para los eventos 
                $eventoTabla = new QueryEvento(); 
                $eventosR = $eventoTabla->getEventos(); 
                $cardG = new eventCard(); 
                if(!($eventosR == null)){
                    foreach($eventosR as $fila => $evento){
                        $cardG->CreateCard($evento['Titulo'], $evento['FechaInicio'], $evento['FechaFin'], $evento['MaximoPersonas'], $evento["Banner"]); 
                    }

                    $mas = <<<AOD
                    <div class="evento">
                        <a href="../evento/index.php">
                            <div class="titulo-mas">
                                <div class="icon"><span class="icon-plus"></span></div> 
                                <p class="mas-button">VER MÁS EVENTOS</p></div>
                        </a>
                    </div>
                   AOD; 
                   echo $mas; 
                }else{
                    echo "   <div class='no-events'>
                    <a href=''>
                        <h2>Aún no hay eventos, puedes ser el primero en crear uno <span class='icon-arrow-right'></span></h2>
    
                    </a>
                   
            </div>";
                }
                echo "     </article>
                </section>";
            }
    
            public function createAllCategories(){
                
            }
    
            public function endOfFile(){
                $end = <<<EOD
                </body>
                </html>
    
                EOD; 
                echo $end; 
            }
        }    

        
    ?>