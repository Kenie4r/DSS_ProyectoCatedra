<?php
    class HTMLMENU{
        private $menuClass = '';
        private $opciones = array("INICIO", "CATEGORÍAS", "EVENTOS", "LOG IN");
        private $links = array("../login/login.php");
        public function __construct($typeMenu, $session = 'u'){
            //Tipo de menu
            switch($typeMenu){
                case 0:
                    $this->menuClass = 'start-menu'; 
                break; 
                case 1:
                    $this->menuClass = 'start-eventos'; 
                break; 
                case 2:
                    $this->menuClass = 'start-mis'; 
                break;
                case 3:
                    $this->menuClass = 'start-login'; 
                    break;
                default: 
                $this->menuClass = 'start-menu'; 
            }
            //Hay session
            switch($session){
                case "u":
                    $this->opciones[0] =  "INICIO";
                    $this->opciones[1] =  "CATEGORÍAS";
                    $this->opciones[2] =  "EVENTOS";
                    $this->opciones[3] =  "LOG IN";
                break;
                case 1:
                    $this->opciones[0] =  "INICIO";
                    $this->opciones[1] =  "MIS CATEGORÍAS";
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[3] =  "LOG OUT";
                    $this->links[0] = "../login/logout.php";
                break;
                case 2:
                    $this->opciones[0] =  "INICIO";
                    $this->opciones[1] =  "CATEGORÍAS";
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[3] =  "LOG OUT";
                    $this->links[0] = "../login/logout.php";
                break;
                case 3:
                    $this->opciones[0] =  "INICIO";
                    $this->opciones[1] =  "CATEGORÍAS";
                    $this->opciones[2] =  "MIS EVENTOS";
                    $this->opciones[3] =  "LOG OUT";
                    $this->links[0] = "../login/logout.php";
                break;
            }
        }
        public function createMenu(){
            $header =<<<AAA
<header>
    <nav>
        <div class='titulo'>ALL STAR <span class='icon-star'></span></div>
        <div id='menu'>
            <a href='../dashboard/index.php' class='menu-item' id='item-1'>{$this->opciones[0]}</a>
            <a href='../categoria/index.php' class='menu-item' id='item-2'>{$this->opciones[1]}</a>
            <a href='../evento/index.php' class='menu-item' id='item-3'>{$this->opciones[2]}</a>
            <a href='{$this->links[0]}' class='menu-item' id='item-4'>{$this->opciones[3]}</a>
            <div id='line' class='{$this->menuClass}'>
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
