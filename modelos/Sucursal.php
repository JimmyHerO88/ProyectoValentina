<?php

require "../config/Conexion.php";

Class Sucursal{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($razon_social,$logo){

        $sql = "INSERT INTO sucursal (razon_social, logo, status)
                VALUES ('$razon_social', '$logo', '1')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idsucursal,$razon_social,$logo){

        $sql = "UPDATE sucursal SET razon_social = '$razon_social', logo = '$logo'
                WHERE idsucursal = '$idsucursal'";

        return ejecutarConsulta($sql);

    }

    //Metodo para DESACTIVAR registros
    public function desactivar($idsucursal){

        $sql = "UPDATE sucursal SET status = '0' WHERE idsucursal = '$idsucursal'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idsucursal){

        $sql = "UPDATE sucursal SET status = '1' WHERE idsucursal = '$idsucursal'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idsucursal){

        $sql = "SELECT * FROM sucursal WHERE idsucursal = '$idsucursal'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM sucursal";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR LAS sucursalS EN EL SELECT
    public function selectSucursal(){

        $sql = "SELECT * FROM sucursal WHERE status = 1";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS sucursalS 
    public function eliminar($idsucursal){

        $sql = "DELETE FROM sucursal WHERE idsucursal = '$idsucursal'";
        
        return ejecutarConsulta($sql);

    }

}