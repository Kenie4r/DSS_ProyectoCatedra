<?php
    class eventCard{
        public function CreateCard($nombre, $fechaIncio, $fechaf, $cantidadM, $banner, $idEvento, $url="../evento/event.php"){
            $dateInicio = date_create($fechaIncio);
            $fechaIncio = date_format($dateInicio, 'Y-m-d');
            $dateFin = date_create($fechaf);
            $fechaf = date_format($dateFin, 'Y-m-d');
            $card = <<<AOD
            <div class="evento">
                <a href="$url?idEvento={$idEvento}">
                    <div class="imagen_event" style="background-image:url('$banner');">
                        <!--<img src="$banner" alt="Banner de evento">-->
                    </div>
                    <div class="custom-shape-divider-bottom-1647922209">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                            <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                        </svg>
                    </div>
                    <div class="custom-shape-divider-bottom-1648437843">
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                            <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
                        </svg>
                    </div>
                    <div class="titulo-e">
                        <div class="t">
                            $nombre <span class="icon-arrow-right"></span>
                        </div>
                        <div class="info">
                            <ul>
                                <li>Inicio: {$fechaIncio} - Fin: {$fechaf}</li>
                            </ul>
                        </div>
                    </div>
                    
                </a>
            </div>
            
           AOD; 
            echo  $card ;
        }
    }



?>