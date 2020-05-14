<?php
class Paginas extends Controlador{

    public function __construct(){
    }
    public function index(){
        
        $datos=[
            'titulo'=>'Bienvenidos a WebAppMVC'
               ];

      $this->vista('paginas/inicio',$datos);
    }
 }