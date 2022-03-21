<?php
    class HTMLMENU{
        private $menuClass = ''; 
        public function __construct($typeMenu){
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
        }
        public function createMenu(){
            $header = "<header><nav><div class='titulo'>   ALL STAR <span class='icon-star'></span></div><div id='menu'><a href='' class='menu-item' id='item-1'>INICIO</a> <a href='' class='menu-item' id='item-2'>CATEGORIAS</a><a href='' class='menu-item' id='item-3'>MIS EVENTOS</a><a href='' class='menu-item' id='item-4'>LOGIN</a>  <div id='line' class='{$this->menuClass}'></div></div></nav>
          </header><script src='../js/menuscript.js'></script>";
            
            echo $header; 
        }

    }
?>