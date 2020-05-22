<?php
class Paginas extends Controlador{

    private $usuarioModelo;

    public function __construct(){
        $this->usuarioModelo = $this->modelo('usuario');
        
    }
    public function index(){
        //obtener los usuarios
        $usuarios = $this->usuarioModelo->obtenerUsuarios();
        //$usuarios = $this->usuarioModelo->obtenerUsuarios();

        $datos=[
            'usuarios'=> $usuarios
               ];

     $this->vista('paginas/inicio',$datos);
     
    }

    public function agregar(){

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos= [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
            ];
            if ($this->usuarioModelo->agregarUsuario($datos)) {
                redireccionar('/paginas');
            }else{
                die('Algo salio mal');
            }
        }else{
            $datos =[
                'nombre'=> '',
                'email'=> '',
                'telefono'=> '',
            ];
            $this->vista('paginas/agregar',$datos);
        }        
    }

    public function editar($id){

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos= [
                'id_usuario' => $id,
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
            ];
           
            if ($this->usuarioModelo->actualizarUsuarioId($datos)) {

                redireccionar('/paginas');
            }else{
                die('Algo salio mal');
            }
        }else{

            //Obeterner informacion de usuario desde el modelo
            $usuario = $this->usuarioModelo->obtenerUsuarioId($id);


            $datos =[
                'id_usuario'=> $usuario->id_usuario,
                'nombre'=> $usuario->nombre,
                'email'=> $usuario->email,
                'telefono'=> $usuario->telefono,
            ];
            $this->vista('paginas/editar',$datos);
        }        
    }

    public function borrar($id){


        //Obeterner informacion de usuario desde el modelo
        $usuario = $this->usuarioModelo->obtenerUsuarioId($id);


         $datos =[
                   'id_usuario'=> $usuario ->id_usuario,
                   'nombre'=> $usuario ->nombre,
                   'email'=> $usuario ->email,
                   'telefono'=> $usuario ->telefono,
         ];


        if ($_SERVER['REQUEST_METHOD']=='POST') {
            
            $datos= [
                'id_usuario' => $id
            ];
            if ($this->usuarioModelo->borrarUsuarioId($datos)) {
                redireccionar('/paginas');
            }else{
                die('Algo salio mal');
            }
        }

             $this->vista('paginas/borrar',$datos);
              
    }
   
 }