<?php

require "../config/Conexion.php";

Class Gasto{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($fecha, $concepto, $tipo, $importe, $idusuario){

        $sql = "INSERT INTO gasto (fecha, concepto, tipo, importe, idusuario)
                VALUES ('$fecha', '$concepto', '$tipo', '$importe', '$idusuario')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idgasto, $fecha, $concepto, $tipo, $importe, $idusuario){

        $sql = "UPDATE gasto SET fecha = '$fecha', concepto = '$concepto', tipo = '$tipo', importe = '$importe', idusuario = '$idusuario' WHERE idgasto = '$idgasto'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idgasto){

        $sql = "SELECT * FROM gasto WHERE idgasto = '$idgasto'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM gasto";
        
        return ejecutarConsulta($sql);

    }
    
    //Metodo para ELIMINAR LAS gastoS 
    public function eliminar($idgasto){

        $sql = "DELETE FROM gasto WHERE idgasto = '$idgasto'";
        
        return ejecutarConsulta($sql);

    }
    
}