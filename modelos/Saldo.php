<?php

require "../config/Conexion.php";

Class Saldo{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($folio, $importe, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO saldo (folio, importe, fecha, idusuario, idsucursal)
                VALUES ('$folio', '$importe', '$fecha', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idsaldo, $folio, $importe, $fecha){

        $sql = "UPDATE saldo SET folio = '$folio', importe = '$importe', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idsaldo = '$idsaldo'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idsaldo){

        $sql = "SELECT * FROM saldo WHERE idsaldo = '$idsaldo'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM saldo";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS saldoS 
    public function eliminar($idsaldo){

        $sql = "DELETE FROM saldo WHERE idsaldo = '$idsaldo'";
        
        return ejecutarConsulta($sql);

    }

}