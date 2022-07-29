<?php

require "../config/Conexion.php";

Class Gasto{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($tipo, $concepto, $importe, $fecha){

        $sql = "INSERT INTO gasto (tipo, concepto, importe, fecha)
                VALUES ('$tipo', '$concepto', '$importe', '$fecha')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idgasto, $tipo, $concepto, $importe, $fecha){

        $sql = "UPDATE gasto SET tipo = '$tipo', concepto = '$concepto', importe = '$importe', fecha = '$fecha'
                WHERE idgasto = '$idgasto'";

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