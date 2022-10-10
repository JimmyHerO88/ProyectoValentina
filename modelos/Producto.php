<?php

require "../config/Conexion.php";

Class Producto{

    //Metodo constructor
    public function _construct(){


    }

    //Metodo para INSERTAR registros
    public function insertar($codigo1, $codigo2, $nombre, $idproveedor, $idlinea, $precio1, $precio2, $idusuario){

        $sql="INSERT INTO producto (codigo1, codigo2, nombre, idproveedor, idlinea, precio1, precio2, status, idusuario)
		VALUES ('$codigo1', '$codigo2','$nombre','$idproveedor','$idlinea','$precio1','$precio2','1','$idusuario')";
		return ejecutarConsulta($sql);

    }

    //Metodo para EDITAR registros
    public function editar($idproducto, $codigo1, $codigo2, $nombre, $idproveedor, $idlinea, $precio1, $precio2, $idusuario){

        $sql="UPDATE producto SET codigo1='$codigo1', codigo2='$codigo2', nombre='$nombre', idproveedor='$idproveedor', idlinea='$idlinea', precio1='$precio1', precio2='$precio2', idusuario='$idusuario', WHERE idproducto='$idproducto'";
		return ejecutarConsulta($sql);

    }

    //Metodo para DESACTIVAR registros
    public function desactivar($idproducto){

        $sql = "UPDATE producto SET condicion = '0' WHERE idproducto = '$idproducto'";

        return ejecutarConsulta($sql);

    }

    //Metodo para ACTIVAR registros
    public function activar($idproducto){

        $sql = "UPDATE producto SET condicion = '1' WHERE idproducto = '$idproducto'";

        return ejecutarConsulta($sql);

    }

    //Metodo para MOSTRAR DATOS DE UN registro
    public function mostrar($idproducto)
	{
		$sql="SELECT * FROM producto WHERE idusuario='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}

    //Metodo para LISTAR TODAS LAS LINEAS
    public function listar()
	{
		$sql="SELECT l.nombre as linea, pr.nombre as proveedor, p.idproducto, p.codigo1, p.codigo2, p.nombre, p.precio1, p.precio2, p.status
         FROM producto p
         JOIN linea l ON p.idlinea =  l.idlinea
         JOIN proveedor pr ON p.idproveedor =  pr.idproveedor";
		return ejecutarConsulta($sql);	
	}

    //Metodo para ELIMINAR LAS productoS 
    public function eliminar($idproducto){

        $sql = "DELETE FROM producto WHERE idproducto = '$idproducto'";
        
        return ejecutarConsulta($sql);

    }

}