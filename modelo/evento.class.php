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

    /* Calcular id */
    public function recuperarID(){
        $lastEvento = $this->query->getEventoByName($this->titulo);
        $this->id = null;
        foreach($lastEvento as $key => $value){
            $this->id = $value["IdEvento"];
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
}

?>