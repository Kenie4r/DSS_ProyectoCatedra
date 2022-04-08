<?php
require_once('../controlador/queryCategoria.php');

class Categoria{
    // Atributos
    private $id;
    private $titulo;
    private $descripcion;

    //Construct
    public function __construct($newId, $newTitulo, $newDescripcion){
        $this->id = $newId;
        $this->titulo = $newTitulo;
        $this->descripcion = $newDescripcion;
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


    /* Insert */
    public function insert(){
        $resultado = $this->query->insertCategoria($this->titulo, $this->descripcion);

        return $resultado;
    }

    public function update(){
        $resultado = $this->query->updateCategoria($this->titulo, $this->descripcion);
        return $resultado;
    }
    /* Calcular id */
    public function recuperarID(){
        $lastEvento = $this->query->getCategoriaByName($this->titulo);
        $this->id = null;
        foreach($lastEvento as $key => $value){
            $this->id = $value["IdCategoria"];
        }
    }
}

?>