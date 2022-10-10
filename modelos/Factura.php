<?php

require "../config/Conexion.php";

Class Factura{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($folio, $importe, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO factura (folio, importe, fecha, idusuario, idsucursal)
                VALUES ('$folio', '$importe', '$fecha', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idfactura, $folio, $importe, $fecha){

        $sql = "UPDATE factura SET folio = '$folio', importe = '$importe', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idfactura = '$idfactura'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idfactura){

        $sql = "SELECT * FROM factura WHERE idfactura = '$idfactura'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM factura";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS facturaS 
    public function eliminar($idfactura){

        $sql = "DELETE FROM factura WHERE idfactura = '$idfactura'";
        
        return ejecutarConsulta($sql);

    }

}