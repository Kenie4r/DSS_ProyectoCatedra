<?php
    class HTMLMENU{
        private $menuClass = 0; //Pagina inicial
        private $opciones = array("INICIO", "CATEGORÍAS", "EVENTOS", "", "", "LOG IN"); //Opciones del navbar
        //Links personalizados del menu
        private $links = array(
            "../dashboard/index.php",
            "../categoria/index.php",
            "../evento/index.php",
            "../usuarios/index.php",
            "",
            "../login/login.php"
        );
        private $usuariosAdmin = ""; //Opciones especiales del admin
        private $usernameOption = "";
        //Opciones para el menu de admin
        private $line_width = 25;
        private $countItems = "";
        //Constructor
        public function __construct($typeMenu, $session = 'u'){
            //Hay session
            switch($session){
                case 1:
                    $this->opciones[1] =  "MIS CATEGORÍAS";
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[3] =  "USUARIOS";
                    $this->opciones[4] = isset($_SESSION['username'])?$_SESSION['username']:"USERNAME";
                    $this->opciones[5] =  "LOG OUT";
                    $this->links[5] = "../login/logout.php";
                    $this->line_width = 16;
                    $this->countItems= "6-";
                    $this->usuariosAdmin =<<<DFM
                    <a href='../usuarios/index.php' class='menu-item' id='item-5'>USUARIOS</a>
                    DFM;
                break;
                case 2:
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[4] = isset($_SESSION['username'])?$_SESSION['username']:"USERNAME";
                    $this->opciones[5] =  "LOG OUT";
                    $this->links[5] = "../login/logout.php";
                    $this->line_width = 20;
                    $this->countItems= "5-";
                break;
                case 3:
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[4] = isset($_SESSION['username'])?$_SESSION['username']:"USERNAME";
                    $this->opciones[5] =  "LOG OUT";
                    $this->links[5] = "../login/logout.php";
                    $this->line_width = 20;
                    $this->countItems= "5-";
                break;
            }
            //Tipo de menu
            switch($typeMenu){
                case 0:
                    $this->menuClass = "start-" . $this->countItems . "menu"; 
                break; 
                case 1:
                    $this->menuClass = "start-" . $this->countItems . "eventos"; 
                break; 
                case 2:
                    $this->menuClass = "start-" . $this->countItems . "mis"; 
                break;
                case 3:
                    $this->menuClass = "start-" . $this->countItems . "login"; 
                    break;
                default: 
                $this->menuClass = 'start-menu'; 
            }
        }
        public function createMenu(){
            $items = "";
            foreach($this->opciones as $key => $opcion){
                if( $opcion != "" ){
                    $items .= <<<DFM
                    <a href='{$this->links[$key]}' class='menu-item' id='item-{$this->countItems}{$key}'>{$opcion}</a>\n
                    DFM;
                }
            }
            $header =<<<AAA
<header>
    <nav>
        <div class='titulo'>ALL STAR <span class='icon-star'></span></div>
        <div id='menu'>
            {$items}
            <div id='line' class='{$this->menuClass}' style="width:{$this->line_width}%;">
            </div>
        </div>
    </nav>
</header>
<script src='../js/menuscript.js'></script>
AAA;
            
            echo $header; 
        }

    }
?>
