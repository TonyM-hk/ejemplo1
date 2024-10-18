<?php

class Venta{

    function __construct()
    {
        require_once ('conexion.php');
        $this->conexion = new Conexion();
    }
    function insertar($folio, $total, $fkusuario, $estatus){
        $sql = "INSERT INTO venta (idventa, folio, fecha, hora, total, fkusuario, estatus) VALUES (null, '{$folio}', NOW(), NOW(), '{$total}', '{$fkusuario}', '{$estatus}')";
        $respuesta=$this->conexion->query($sql);
        $id=$this->conexion->insert_id;
        return $id;
    }
    // function insertarDetalle($fkproducto, $fkventa, $cantidad, $subtotal, $estatus){
    //     $sql = "INSERT INTO detalle_venta (iddetalle_venta, fkproducto, fkventa, cantidad, subtotal, estatus) VALUES (null, '{$fkproducto}', '{$fkventa}', '{$cantidad}', '{$subtotal}', '{$estatus}')";
    //     $respuesta=$this->conexion->query($sql);
    //     return $this->conexion->insert_id;
    // }
    function verCarrito($idusuario){
        $sql="SELECT * FROM venta  WHERE fkusuario='{$idusuario}' AND estatus=0";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    } 
    function mostrarVenta($idusuario,$estatus){
        $sql="SELECT * FROM venta v LEFT JOIN detalle_venta d WHERE v.fkusuario='{$idusuario}' AND estatus='{$estatus}'";
        $respuesta=$this->conexion->query($sql);
        return $respuesta;
    }
    }
}

?>