<?php

require "../config/Conexion.php";

Class Deposito{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($fecha, $concepto, $tipo, $importe){

        $sql = "INSERT INTO deposito (fecha, concepto, tipo, importe)
                VALUES ('$fecha', '$concepto', '$tipo', '$importe')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($iddeposito, $fecha, $concepto, $tipo, $importe){

        $sql = "UPDATE deposito SET fecha = '$fecha', concepto = '$concepto', tipo = '$tipo', importe = '$importe' WHERE iddeposito = '$iddeposito'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($iddeposito){

        $sql = "SELECT * FROM deposito WHERE iddeposito = '$iddeposito'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM deposito";
        
        return ejecutarConsulta($sql);

    }
    
    //Metodo para ELIMINAR LAS depositoS 
    public function eliminar($iddeposito){

        $sql = "DELETE FROM deposito WHERE iddeposito = '$iddeposito'";
        
        return ejecutarConsulta($sql);

    }
    
}