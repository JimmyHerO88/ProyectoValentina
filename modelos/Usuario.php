<?php

require "../config/Conexion.php";

Class Usuario{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($nombre, $login, $clave, $imagen){

        $sql = "INSERT INTO usuario (nombre, login, clave, imagen)
                VALUES ('$nombre', '$login', '$clave', '$imagen')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idusuario, $nombre, $login, $clave, $imagen){

        $sql = "UPDATE usuario SET nombre = '$nombre', login = '$login', clave = '$clave', imagen = '$imagen' WHERE idusuario = '$idusuario'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idusuario){

        $sql = "SELECT * FROM usuario WHERE idusuario = '$idusuario'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM usuario";
        
        return ejecutarConsulta($sql);

    }
    
    //Metodo para ELIMINAR LAS usuarioS 
    public function eliminar($idusuario){

        $sql = "DELETE FROM usuario WHERE idusuario = '$idusuario'";
        
        return ejecutarConsulta($sql);

    }
    
}