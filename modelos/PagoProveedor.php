<?php

require "../config/Conexion.php";

Class PagoProveedor{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($concepto, $importe, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO pago_proveedor (concepto, importe, fecha, idusuario, idsucursal)
                VALUES ('$concepto', '$importe', '$fecha', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idpagoproveedor, $concepto, $importe, $fecha){

        $sql = "UPDATE pago_proveedor SET concepto = '$concepto', importe = '$importe', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idpagoproveedor = '$idpagoproveedor'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idpagoproveedor){

        $sql = "SELECT * FROM pago_proveedor WHERE idpagoproveedor = '$idpagoproveedor'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM pago_proveedor";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS gastoS 
    public function eliminar($idpagoproveedor){

        $sql = "DELETE FROM pago_proveedor WHERE idpagoproveedor = '$idpagoproveedor'";
        
        return ejecutarConsulta($sql);

    }

}