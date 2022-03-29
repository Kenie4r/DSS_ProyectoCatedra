<?php
    class eventCard{
        public function CreateCard($nombre, $fechaIncio, $fechaf, $cantidadM, $banner, $idEvento){
            $card = <<<AOD
            <div class="evento">
                <a href="../evento/event.php?idEvento={$idEvento}">
                    <div class="imagen_event">
                        <img src="$banner" alt="">
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
                                <li>{$fechaIncio} - {$fechaf}</li>
                                <li>Asistiran: 0/{$cantidadM}</li>
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