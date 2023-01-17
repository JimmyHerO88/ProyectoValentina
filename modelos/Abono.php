<?php

require "../config/Conexion.php";

Class Abono{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($fecha, $idempleado, $tipo, $importe, $idusuario, $idabononomina){

        $sql = "INSERT INTO abono (fecha, idempleado, tipo, importe, idusuario, idabononomina)
                VALUES ('$fecha', '$idempleado', '$tipo', '$importe', '$idusuario', '$idabononomina')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idabono, $fecha, $idempleado, $tipo, $importe, $idusuario, $idabononomina){

        $sql = "UPDATE abono SET fecha = '$fecha', idempleado = '$idempleado', tipo = '$tipo', importe = '$importe', idusuario = '$idusuario', cant4 = '$cant4', cant5 = '$cant5', cant6 = '$cant6', cant7 = '$cant7', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal', idabononomina = '$idabononomina'
                WHERE idabono = '$idabono'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idabono){

        $sql = "SELECT * FROM abono WHERE idabono = '$idabono'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT *  FROM abono INNER JOIN empleado ON abono.idempleado = empleado.idempleado";
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS abonoS 
    public function eliminar($idabono){

        $sql = "DELETE FROM abono WHERE idabono = '$idabono'";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS abonoS 
    public function eliminarAbonoNonima($idabononomina){

        $sql = "DELETE FROM abono WHERE idabononomina = '$idabononomina'";
        
        return ejecutarConsulta($sql);

    }

}