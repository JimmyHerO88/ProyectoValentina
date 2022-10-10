<?php

require "../config/Conexion.php";

Class Linea{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($nombre, $idusuario){

        $sql = "INSERT INTO linea (nombre, status, idusuario)
                VALUES ('$nombre', '1', '$idusuario')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idlinea, $nombre, $idusuario){

        $sql = "UPDATE linea SET nombre = '$nombre', idusuario = '$idusuario'
                WHERE idlinea = '$idlinea'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idlinea){

        $sql = "SELECT * FROM linea WHERE idlinea = '$idlinea'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para DESACTIVAR registros
    public function desactivar($idlinea){

        $sql = "UPDATE linea SET status = '0' WHERE idlinea = '$idlinea'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR LAS sucursalS EN EL SELECT
    public function selectLinea(){

        $sql = "SELECT * FROM linea WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idlinea){

        $sql = "UPDATE linea SET status = '1' WHERE idlinea = '$idlinea'";

        return ejecutarConsulta($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM linea";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS lineaS 
    public function eliminar($idlinea){

        $sql = "DELETE FROM linea WHERE idlinea = '$idlinea'";
        
        return ejecutarConsulta($sql);

    }

}