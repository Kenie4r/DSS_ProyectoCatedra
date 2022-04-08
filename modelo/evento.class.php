<?php
require_once('../controlador/queryEvent.php');

class Evento{
    // Atributos
    private $id;
    private $titulo;
    private $descripcion;
    private $fechaInicio;
    private $fechaFin;
    private $tipoEvento;
    private $maximoPersona;
    private $banner;
    private $categorias;
    private $query;

    //Construct
    public function __construct($newId, $newTitulo, $newDescripcion, $newFechaInicio, $newFechaFin, $newTipoEvento, $newMaxPersonas, $newBanner, $newCategory){
        $this->id = $newId;
        $this->titulo = $newTitulo;
        $this->descripcion = $newDescripcion;
        $this->fechaInicio = $newFechaInicio;
        $this->fechaFin = $newFechaFin;
        $this->tipoEvento = $newTipoEvento;
        $this->maximoPersona = $newMaxPersonas;
        $this->banner = $newBanner;
        $this->categorias = $newCategory;
        $this->query = new QueryEvento();
    }

    //Setters
    public function setId($newId){
        $this->id = $newId;
    }

    public function setTitulo($newTitulo){
        $this->titulo = $newTitulo;
    }

    public function setDescripcion($newDescripcion){
        $this->descripcion = $newDescripcion;
    }

    public function setFechaInicio($newFechaInicio){
        $this->fechaInicio = $newFechaInicio;
    }

    public function setFechaFin($newFechaFin){
        $this->fechaFin = $newFechaFin;
    }

    public function setTipoEvento($newTipoEvento){
        $this->tipEevento = $newTipoEvento;
    }

    public function setMaxPersonas($newMaxPersonas){
        $this->maximoPersona = $newMaxPersonas;
    }

    public function setBanner($newBanner){
        $this->banner = $newBanner;
    }

    public function setCategorias($newCategory){
        $this->categorias = $newCategory;
    }

    //Getters
    public function getId(){
        return $this->id;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }

    public function getTipoEvento(){
        return $this->tipoEvento;
    }

    public function getMaxPersonas(){
        return $this->maximoPersona;
    }

    public function getBanner(){
        return $this->banner;
    }

    public function getCategorias(){
        return $this->categorias;
    }

    /* Insert */
    public function insert(){
        $resultado = $this->query->insertEvento($this->titulo, $this->descripcion, $this->fechaInicio, $this->fechaFin, $this->tipoEvento, $this->maximoPersona, $this->banner);

        return $resultado;
    }

    /* Update */
    public function update(){
        $resultado = $this->query->updateEvento($this->id, $this->titulo, $this->descripcion, $this->fechaInicio, $this->fechaFin, $this->tipoEvento, $this->maximoPersona, $this->banner);

        return $resultado;
    }

    /* Eliminar evento */
    public function delete(){
        return $this->query->deleteEvento( $this->id );
    }

    /* Calcular id */
    public function recuperarID(){
        $lastEvento = $this->query->getEventoByName($this->titulo);
        $this->id = null;
        foreach($lastEvento as $key => $value){
            $this->id = $value;
        }
    }

    /* Guardar categorias */
    public function insertCategory(){
        if($this->id != null){
            $errorresCategoria = 0; //Errores por cada categoria no ingresada
            //Recorremos las categorias
            foreach($this->categorias as $key => $value){
                $resultC = $this->query->insertEventoAndCategoria($this->id, $value); //Guardamos la relacion
                //Se verifica si se guardaron
                if(!$resultC){
                    $errorresCategoria++;
                }
            }
            if($errorresCategoria > 0){
                return false;
            }else{
                return true;
            }
        }
    }

    /* Actualizar detalles evento y categoria */
    public function updateCategory(){
        $errorresCategoria = 0; //Errores de algun tipo
        $detalles = $this->query->getEventoAndCategoriaByIDEvento($this->id); //Obtenemos las relaciones previamente creadas

        if( count($detalles) == 0 && count($this->categorias) > 0 ){ //Si no hay detalles previos y hay nuevas categorias, se crean
            //Recorremos las categorias
            foreach($this->categorias as $key => $value){
                $resultC = $this->query->insertEventoAndCategoria($this->id, $value); //Guardamos la relacion
                //Se verifica si se guardaron
                if(!$resultC){
                    $errorresCategoria++;
                }
            }
        }else if( count($this->categorias) > 0 ){ //Entonces si existen detalles previos
            //Eliminamos los detalles que no aparezcan
            foreach($detalles as $keyDetalle => $detalle){ //Recorremos los detalles
                $i = 0;
                foreach($this->categorias as $key => $value){ //Recorremos las categorias
                    if( $detalle['idCategoria'] == $value ){ //Verificamos que coincidan
                        $i++;
                    }
                }
                if( $i <= 0 ){ //Si no coinciden se elimina
                    $resultC = $this->query->deleteCategoriaAndEvento($detalle['idDetalle']); //Guardamos la relacion
                    //Se verifica si se guardaron
                    if(!$resultC){
                       $errorresCategoria++;
                    }
                }
            }

            //Agregamos los nuevos detalles
            foreach($this->categorias as $key => $value){ //Recorremos las categorias
                $i = 0;
                foreach($detalles as $keyDetalle => $detalle){ //Recorremos los detalles
                    if( $detalle['idCategoria'] == $value ){ //Verificamos que coincidan
                        $i++;
                    }
                }
                if( $i <= 0 ){ //Si no coinciden se guarda
                    $resultC = $this->query->insertEventoAndCategoria($this->id, $value); //Guardamos la relacion
                    //Se verifica si se guardaron
                    if(!$resultC){
                       $errorresCategoria++;
                    }
                }
            }
        }

        if($errorresCategoria > 0){
            return false;
        }else{
            return true;
        }
    }

    /* Eliminar detalle evento y usuario */
    public function deleteUsuarios(){
        $resultado = false;
        $contador = 0;
        $detallesEC = $this->query->getUsuarioAndEventoByIDEvento( $this->id );
        foreach ($detallesEC as $key => $fila) {
            $resultado = $this->query->deleteUsuarioAndEvento($fila['idDetalle']);
            if($resultado){
                $contador++;
            }
        }
        if(count($detallesEC) == 0){
            $contador++;
        }
        if($contador>0){
            return true;
        }else{
            return false;
        }
    }

    /* Eliminar detalle evento y categoria */
    public function deleteCategorias(){
        $resultado = false;
        $contador = 0;
        $detallesEC = $this->query->getEventoAndCategoriaByIDEvento( $this->id );
        foreach ($detallesEC as $key => $fila) {
            $resultado = $this->query->deleteCategoriaAndEvento($fila['idDetalle']);
            if($resultado){
                $contador++;
            }
        }
        if(count($detallesEC) == 0){
            $contador++;
        }
        if($contador>0){
            return true;
        }else{
            return false;
        }
    }
}

?>