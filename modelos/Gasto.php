<?php

require "../config/Conexion.php";

Class Gasto{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($fecha, $concepto, $tipo, $importe){

        $sql = "INSERT INTO gasto (fecha, concepto, tipo, importe)
                VALUES ('$fecha', '$concepto', '$tipo', '$importe')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idgasto, $fecha, $concepto, $tipo, $importe){

        $sql = "UPDATE gasto SET fecha = '$fecha', concepto = '$concepto', tipo = '$tipo', importe = '$importe' WHERE idgasto = '$idgasto'";

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