<?php

// Cargo mis librerias !!!
require_once'config/Configurar.php';



//require_once'librerias/Core.php';
//require_once'librerias/Base.php';
//require_once'librerias/Controlador.php';

//Autoload PHP para las clases 
spl_autoload_register(function($nombreClase){
    require_once 'librerias/'.$nombreClase.'.php';
});