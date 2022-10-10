<?php

require "../config/Conexion.php";

Class Prestamo{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($fecha, $idempleado, $tipo, $importe, $idusuario){

        $sql = "INSERT INTO prestamo (fecha, idempleado, tipo, importe, idusuario)
                VALUES ('$fecha', '$idempleado', '$tipo', '$importe', '$idusuario')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idprestamo, $fecha, $idempleado, $tipo, $importe, $idusuario){

        $sql = "UPDATE prestamo SET fecha = '$fecha', idempleado = '$idempleado', tipo = '$tipo', importe = '$importe', idusuario = '$idusuario', cant4 = '$cant4', cant5 = '$cant5', cant6 = '$cant6', cant7 = '$cant7', fecha = '$fecha', idusuario = '$idusuario', idsucursal = '$idsucursal'
                WHERE idprestamo = '$idprestamo'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idprestamo){

        $sql = "SELECT * FROM prestamo WHERE idprestamo = '$idprestamo'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT *  FROM prestamo INNER JOIN empleado ON prestamo.idempleado = empleado.idempleado";
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS prestamoS 
    public function eliminar($idprestamo){

        $sql = "DELETE FROM prestamo WHERE idprestamo = '$idprestamo'";
        
        return ejecutarConsulta($sql);

    }

}