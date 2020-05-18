<?php

//Clase para conectarse ala base de datos y ejecutar consultas
//PDO crear una conexion tipo mySQL// buscar patron factory multiples origenes  de datos
class Base{
    private $host =DB_HOST;
    private $usuario =DB_USUARIO;
    private $password =DB_PASSWORD;
    private $nombre =DB_NOMBRE;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        // configuro mi conexion ala BD
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this-> nombre_base;
        $opciones = array(
            PDO::ATTR_PERSISTENT =>true,
            PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION
        );

        // Crear una instancia de PDO
        try{
            $this->dbh =new PDO($dsn, $this->usuario, $this->
            password, $opciones);
            $this->dbh->exec('set names utf');         
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    } 
    //PREPARAMOS LA CONSULTA
    public function query($sql){
       $this->stmt = $this->dbh->prepare($sql);
    }
    //VINCULAMOS LA CONSULTA CON BIND
    public function bind($parametro, $valor, $tipo =null){

        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo =PDO::PARAM_INT;
                    break;
                    case is_bool($valor):
                        $tipo =PDO::PARAM_BOOL;
                        break;
                        case is_null($valor):
                            $tipo =PDO::PARAM_NULL;
                            break;
                default:
                $tipo =PDO::PARAM_NULL;
                        break;   
            }
        }
    
        $this->stmt->bindValue($parametro, $valor, $tipo);   

    }
    // EJECUTA LA CONSULTA
    public function execute(){
       return $this->stmt->execute();
    }

    //OBTENER LOS REGISTROS DE LA CONSULTA
    public function registros(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENER UN SOLO REGISTROS 
    public function registro(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
     //OBTENER LA CANTIDAD DE FILAS CON EL METODO rowCount
     public function rowCount(){
        $this->execute();
        return $this->stmt->rowCount();
    }
    

}

