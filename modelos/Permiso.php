<?php

require "../config/Conexion.php";

Class Permiso{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para LISTAR TODOS LOS registros
    public function listar(){

        $sql = "SELECT * FROM permiso";
        
        return ejecutarConsulta($sql);

    }

}