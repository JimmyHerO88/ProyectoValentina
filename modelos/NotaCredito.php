<?php

require "../config/Conexion.php";

Class NotaCredito{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($folio, $cliente, $importe, $abono, $fecha, $idusuario, $idsucursal){

        $sql = "INSERT INTO notas_credito (folio, cliente, importe, abono, fecha, idusuario, idsucursal)
                VALUES ('$folio', '$cliente', '$importe', '$abono','$fecha', '$idusuario', '$idsucursal')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idnota, $folio, $cliente, $importe, $abono, $fecha, $idusuario, $idsucursal){

        $sql = "UPDATE notas_credito SET folio = '$folio', cliente = '$cliente', importe = '$importe', abono = '$abono', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idnota = '$idnota'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idnota){

        $sql = "SELECT * FROM notas_credito WHERE idnota = '$idnota'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM notas_credito";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS notas_creditoS 
    public function eliminar($idnota){

        $sql = "DELETE FROM notas_credito WHERE idnota = '$idnota'";
        
        return ejecutarConsulta($sql);

    }

}