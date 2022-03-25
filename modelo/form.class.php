<?php

//Clase: Formulario
//Se usa para generar los input básicos de un formulario.

class Formulario{
    //Textbox
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Para usarlas, colocar 1 en su parametro): Required, Autofocus 
    public function textbox($name, $placeholder, $required = "", $autofocus = ""){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Input
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="text" name="$name" id="$name" placeholder="$placeholder" $required $autofocus>
</div>\n
DFM;

        return $input;
    }

    //Number
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlas): Required, Autofocus
    //Propiedades opcionales(Colocar sus valores en el call): Valor mínimo, Valor máximo, Step 
    public function number($name, $placeholder, $required = "", $autofocus = "", $min = "", $max = "", $step = ""){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Input
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="number" name="$name" id="$name" min="$min" max="$max" step="$step" placeholder="$placeholder" $required $autofocus>
</div>\n
DFM;

        return $input;
    }

    //Textarea
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlas): Required, Autofocus
    //Propiedades opcionales(Colocar valores para activarlos): Número de columnas, Números de filas,
    public function textarea($name, $placeholder, $required = "", $autofocus = "", $cols = 30, $rows = 10){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Input
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <textarea name="$name" id="$name" cols="$cols" rows="$rows"$required, $autofocus></textarea>
</div>\n
DFM;

        return $input;
    }

    //Date
    //Propiedades: Nombre e ID
    //Propiedades opcionales(Coloca 1 para activarlo): Required, Autofocus
    public function date($name, $required = "", $autofocus = ""){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Input
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="date" name="$name" id="$name"$required $autofocus>
</div>\n
DFM;

        return $input;
    }

    //Datetime
    //Sin funcionar
    public function datetime($name){
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="datetime" name="$name" id="$name">
</div>\n
DFM;

        return $input;
    }

    //Select
    //Propiedades: Nombre e ID, Opciones, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlo): Required, Autofocus
    public function select($name, $opciones, $placeholder, $required = "", $autofocus = ""){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Options
        $options = "";
        foreach($opciones as $opcion => $opcioncita){
            $options .= "<option value='$opcion'>$opcioncita</option>";
        }

        //Input
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <select name="$name" id="$name"$required $autofocus>
        <option value="">$placeholder</option>
        $options;
    </select>
</div>\n
DFM;

        return $input;
    }
}

?>