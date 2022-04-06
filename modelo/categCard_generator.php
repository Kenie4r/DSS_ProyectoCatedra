<?php
    class eventCard{
        public function CreateCard($titulo, $descripcion,$idCategoria){
            $card = <<<AOD
            <div class="evento">
                    <div class="titulo-e">
                        <div class="t">
                            $titulo
                        </div>
                        <div class="info">
                          <p>$descripcion</p>
                          <div class="titulo-a">
                            <a class="amarillo" href='update.php?id=$idCategoria'>Modificar</a>
                            <a class="rojo" href='delete.php?id=$idCategoria''>Eliminar</a>
                            <a class="celeste" href='../evento/index.php?id=$idCategoria''>Ver</a>
                          </div>
                        </div>
                    </div>
            </div>
            
           AOD; 
            echo  $card ;
        }
    }



?>