<?php

require "../config/Conexion.php";

Class Total{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($fecha, $total_f, $folio_1, $folio_2, $total_r, $folio_3, $folio_4, $nota, $idusuario, $idsucursal){

        $sql = "INSERT INTO totales (fecha, total_f, folio_1, folio_2, total_r, folio_3, folio_4, nota, idusuario, idsucursal)
                VALUES ('$fecha', '$total_f', '$folio_1', '$folio_2', '$total_r', '$folio_3', '$folio_4', '$nota', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idtotal, $fecha, $total_f, $folio_1, $folio_2, $total_r, $folio_3, $folio_4, $nota, $idusuario, $idsucursal){

        $sql = "UPDATE totales SET fecha = '$fecha', total_f = '$total_f', total_r = '$total_r', folio_1 = '$folio_1', folio_2 = '$folio_2', folio_3 = '$folio_3', folio_4 = '$folio_4', nota = '$nota', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idtotal = '$idtotal'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idtotal){

        $sql = "SELECT * FROM totales WHERE idtotal = '$idtotal'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM totales";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS totalesS 
    public function eliminar($idtotal){

        $sql = "DELETE FROM totales WHERE idtotal = '$idtotal'";
        
        return ejecutarConsulta($sql);

    }

}