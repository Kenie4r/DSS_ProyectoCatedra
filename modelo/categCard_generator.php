<?php
    class eventCard{
        public function CreateCard($titulo, $descripcion,$idCategoria, $rol){
            //Add
            $opciones = "";
            if( $rol == "1" || $rol == "2" ){
                $opciones=<<<AAA
                <a class="amarillo" href='update.php?id=$idCategoria'>Modificar</a>
                <a class="rojo" href='delete.php?id=$idCategoria''>Eliminar</a>
                AAA;
            }
            //Add
            
            $card = <<<AOD
            <div class="evento">
                    <div class="titulo-e">
                        <div class="t">
                            $titulo
                        </div>
                        <div class="info">
                          <p>$descripcion</p>
                          <div class="titulo-a">
                            $opciones
                            <a class="celeste" href='../evento/index.php?idCategoria=$idCategoria''>Ver</a>
                          </div>
                        </div>
                    </div>
            </div>
            
           AOD; 
            echo  $card ;
        }
    }



?>