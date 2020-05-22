<?php
class Usuario{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }
    public function obtenerUsuarios(){
        $this ->db->query('SELECT * FROM usuarios');
        $resultados = $this->db->registros();
        return $resultados;
    }

    public function agregarUsuario($datos){
        $this->db->query('INSERT INTO usuarios (nombre, email, telefono) VALUES (:nombre, :email, :telefono)');
        
        //Vinculo los valores
        $this->db->bind(':nombre',$datos['nombre'],PDO::PARAM_STR);
        $this->db->bind(':email',$datos['email'],PDO::PARAM_STR);
        $this->db->bind(':telefono',$datos['telefono'],PDO::PARAM_STR);
               

        //lo ejecuto
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
        
    }

    public function obtenerUsuarioId($id){

        $this ->db->query('SELECT * FROM usuarios WHERE id_usuario = :id');
        $this->db->bind(':id',$id ,PDO::PARAM_INT);
        $fila = $this->db->registro();
        return $fila[0];  
    }

    public function actualizarUsuarioId($datos){
        $this->db->query('UPDATE usuarios SET nombre = :nombre, email = :email, telefono= :telefono WHERE id_usuario = :id');

        //Vincular valores
        $this->db->bind(':id',$datos['id_usuario'],PDO::PARAM_STR);
        $this->db->bind(':nombre',$datos['nombre'],PDO::PARAM_STR);
        $this->db->bind(':email',$datos['email'],PDO::PARAM_STR);
        $this->db->bind(':telefono',$datos['telefono'],PDO::PARAM_STR);

        //Ejecutar
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function borrarUsuarioId($datos){
        $this->db->query('DELETE FROM usuarios WHERE id_usuario = :id');

        //Vincular valores
        $this->db->bind(':id',$datos['id_usuario'],PDO::PARAM_STR);
       
        //Ejecutar
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }


}