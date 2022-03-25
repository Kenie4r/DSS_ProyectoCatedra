<?php

class Table{
    public function createTable($header, $body, $cols){
        //Thead
        $thead = "";
        $tbody = "";

        foreach ($header as $key => $value) {
            $thead .= "<th>$value</th>";
        }

        //Tbody
        if(is_null($body)){
            $tbody .= "<tr>";
            $tbody .= "<td colspan='$cols'>No existen registros.</td>";
            $tbody .= "</tr>";
        }else{
            foreach ($body as $key => $value) {
                $tbody .= "<tr>";
                foreach ($value as $key2 => $value2) {
                    $tbody .= "<td>$value2</td>";
                }
                $tbody .= "</tr>";
            }
        }
        $tabla = <<<DFM
<table>
    <thead>
        <tr>
            $thead
        </tr>
    </thead>
    <tbody>
        $tbody;
    </tbody>
</table>\n
DFM;
        echo $tabla;
    }
}

?>