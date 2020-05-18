<?php
class Paginas extends Controlador{

    public function __construct(){
    }
    public function index(){
        
        $datos=[
            'titulo'=>'Bienvenidos a WebAppMVC con Crud'
               ];

     $this->vista('paginas/inicio',$datos);
     
    }
 }