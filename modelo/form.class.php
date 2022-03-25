<?php

class Formulario{
    public function textbox($name){
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="text" name="$name" id="$name" placeholder="$name">
</div>\n
DFM;

        return $input;
    }

    public function number($name){
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="number" name="$name" id="$name" placeholder="$name">
</div>\n
DFM;

        return $input;
    }

    public function textarea($name){
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <textarea name="$name" id="$name" cols="30" rows="10"></textarea>
</div>\n
DFM;

        return $input;
    }

    public function date($name){
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <input type="date" name="$name" id="$name">
</div>\n
DFM;

        return $input;
    }

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

    public function select($name, $opciones){
        $options = "";
        foreach($opciones as $opcion => $opcioncita){
            $options .= "<option value='$opcion'>$opcioncita</option>";
        }
        $input =<<<DFM
<div class="contenedor-input">
    <div class="contenedor-label">
        <label for="$name">$name</label>
    </div>
    <select name="$name" id="$name">
        <option value="">Elige una opción...</option>
        $options;
    </select>
</div>\n
DFM;

        return $input;
    }
}

?>