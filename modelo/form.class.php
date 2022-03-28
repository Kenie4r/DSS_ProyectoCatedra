<?php

//Clase: Formulario
//Se usa para generar los input básicos de un formulario.

class Formulario{
    //Textbox ---------------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Label, Placeholder
    //Propiedades opcionales(Para usarlas, colocar 1 en su parametro): Required, Autofocus 
    public function textbox($name, $label, $placeholder, $required = "", $autofocus = ""){
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
                <label for="$name">$label</label>
            </div>
            <input type="text" name="$name" id="$name" placeholder="$placeholder" title="$placeholder" $required $autofocus>
        </div>\n
        DFM;

        return $input;
    }

    //Number ------------------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Label, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlas): Required, Autofocus
    //Propiedades opcionales(Colocar sus valores en el call): Valor mínimo, Valor máximo, Step 
    public function number($name, $label, $placeholder, $required = "", $autofocus = "", $min = "", $max = "", $step = ""){
        //Required
        if($required == 1){
            $required = "required";
        }

        //Autofocus
        if($autofocus == 1){
            $autofocus = "autofocus";
        }

        //Minimo
        if(is_numeric($min)){
            $min = "min='$min'";
        }

        //Maximo
        if(is_numeric($max)){
            $max = "max='$max'";
        }

        //Setp
        if(is_numeric($step)){
            $step = "step='$step'";
        }

        //Input
        $input =<<<DFM
        <div class="contenedor-input">
            <div class="contenedor-label">
                <label for="$name">$label</label>
            </div>
            <input type="number" name="$name" id="$name" $min $max $step placeholder="$placeholder" title="$placeholder" $required $autofocus>
        </div>\n
        DFM;

        return $input;
    }

    //Textarea ----------------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, label, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlas): Required, Autofocus
    //Propiedades opcionales(Colocar valores para activarlos): Número de columnas, Números de filas,
    public function textarea($name, $label, $placeholder, $required = "", $autofocus = "", $cols = 30, $rows = 10){
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
        <div class="contenedor-textarea">
            <div class="contenedor-label">
                <label for="$name">$label</label>
            </div>
            <textarea name="$name" id="$name" cols="$cols" rows="$rows" title="$placeholder" $required $autofocus>$placeholder</textarea>
        </div>\n
        DFM;

        return $input;
    }

    //Date --------------------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Descripcion del input, Tooltip
    //Propiedades opcionales(Coloca 1 para activarlo): Required, Autofocus
    public function date($name, $label, $tooltip, $required = "", $autofocus = ""){
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
                <label for="$name">$label</label>
            </div>
            <input type="date" name="$name" id="$name" title="$tooltip" $required $autofocus>
        </div>\n
        DFM;

        return $input;
    }

    //Datetime ---------------------------------------------------------------------------------------
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

    //Select ----------------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, $label, Opciones, Placeholder
    //Propiedades opcionales(Colocar 1 para activarlo): Required, Autofocus
    public function select($name, $label, $opciones, $placeholder, $required = "", $autofocus = ""){
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
                <label for="$name">$label</label>
            </div>
            <select name="$name" id="$name" title="$placeholder" $required $autofocus>
                <option value="">$placeholder</option>
                $options;
            </select>
        </div>\n
        DFM;

        return $input;
    }

    //Textbox Personalizado: Titulo --------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Para usarlas, colocar 1 en su parametro): Required, Autofocus 
    public function textboxPersonalizado_Titulo($name, $tooltip, $value, $required = "", $autofocus = ""){
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
        <div class="form-header-titulo">
            <input type="text" name="$name" id="$name" title="$tooltip" value="$value" $required $autofocus>
        </div>\n
        DFM;

        return $input;
    }

    //Button submit --------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Para usarlas, colocar 1 en su parametro): Required, Autofocus 
    public function buttonSubmit($name){
        //Input
        $input =<<<DFM
        <button type="submit" name="$name" id="$name" value="Enviado">+ Guardar</button>\n
        DFM;

        return $input;
    }

    //Button cancel --------------------------------------------------------------------------------
    //Propiedades: Nombre e ID, Placeholder
    //Propiedades opcionales(Para usarlas, colocar 1 en su parametro): Required, Autofocus 
    public function buttonCancel($link){
        //Input
        $input =<<<DFM
        <a href="$link">X Cancelar</a>\n
        DFM;

        return $input;
    }
}

?>