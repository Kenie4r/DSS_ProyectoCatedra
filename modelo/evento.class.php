<?php

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

    public function setTipoEvento($newEvento){
        $this->evento = $newEvento;
    }

    public function setMaxPersonas($newMaxPersonas){
        $this->maxPersonas = $newMaxPersonas;
    }

    public function setBanner($newBanner){
        $this->banner = $newBanner;
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
        return $this->evento;
    }

    public function getMaxPersonas(){
        return $this->maxPersonas;
    }

    public function getBanner(){
        return $this->banner;
    }
}

?>