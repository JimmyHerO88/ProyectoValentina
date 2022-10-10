<?php

require "../config/Conexion.php";

Class Proveedor{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($nombre, $idusuario){

        $sql = "INSERT INTO proveedor (nombre, status, idusuario)
                VALUES ('$nombre', '1', '$idusuario')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idproveedor, $nombre, $idusuario){

        $sql = "UPDATE proveedor SET nombre = '$nombre', idusuario = '$idusuario'
                WHERE idproveedor = '$idproveedor'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idproveedor){

        $sql = "SELECT * FROM proveedor WHERE idproveedor = '$idproveedor'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para DESACTIVAR registros
    public function desactivar($idproveedor){

        $sql = "UPDATE proveedor SET status = '0' WHERE idproveedor = '$idproveedor'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idproveedor){

        $sql = "UPDATE proveedor SET status = '1' WHERE idproveedor = '$idproveedor'";

        return ejecutarConsulta($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM proveedor";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR LAS sucursalS EN EL SELECT
    public function selectProveedor(){

        $sql = "SELECT * FROM proveedor WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS proveedorS 
    public function eliminar($idproveedor){

        $sql = "DELETE FROM proveedor WHERE idproveedor = '$idproveedor'";
        
        return ejecutarConsulta($sql);

    }

}