<?php

require "../config/Conexion.php";

Class Registro_Notas{
    //Metodo constructor
    public function _construct(){}

    //Metodo para INSERTAR registros
    public function insertar($fecha,$rango_folios,$concepto,$total,$cliente,$tipo_pago,$observaciones,$idusuario){

        $sql = "INSERT INTO registro_notas (fecha, rango_folios, concepto, total, cliente, tipo_pago, observaciones, idusuario)
                VALUES ('$fecha','$rango_folios','$concepto','$total','$cliente','$tipo_pago','$observaciones','$idusuario')";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idnota,$fecha,$rango_folios,$concepto,$total,$cliente,$tipo_pago,$observaciones,$idusuario){

        $sql = "UPDATE registro_notas SET fecha = '$fecha', rango_folios = '$rango_folios', concepto = '$concepto', total = '$total', cliente = '$cliente', tipo_pago = '$tipo_pago', observaciones = '$observaciones', idusuario = '$idusuario'
                WHERE idnota = '$idnota'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idnota){

        $sql = "SELECT * FROM registro_notas WHERE idnota = '$idnota'";
        
        return ejecutarConsultaSimpleFila($sql);

    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM registro_notas";
        
        return ejecutarConsulta($sql);

    }

    //Metodo para ELIMINAR LAS registro_notasS 
    public function eliminar($idnota){

        $sql = "DELETE FROM registro_notas WHERE idnota = '$idnota'";
        
        return ejecutarConsulta($sql);

    }
    
}