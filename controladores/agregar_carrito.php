<?php

include ("../clases/producto.php");
$producto = new Producto();

//recibo los datos del formulario previo
$fkproducto = $_POST['fkproducto'];
$cantidad = $_POST['cantidad'];

//incluyo la clase venta
include("../clases/venta.php");
$venta = new Venta();

//busco si el usuario tiene un carrito activo
$carritoActivo = $venta->verCarrito(1); //le envio 1 porque dejé un usuario estático, pero debería ser el usuario logueado usando por ejemplo $SESSION['idusuario'];
if(mysqli_num_rows($carritoActivo)>0){
    //busco el id del detalle de venta del carrito activo
    $carrito = mysqli_fetch_assoc($carritoActivo);
    $fkventa = $carrito['idventa'];
}else{
    //creo una venta
    $fkventa = $venta->insertar(null, 0, 1, 0);
}

//obtengo los datos del producto
$datosProducto = mysqli_fetch_assoc($producto->mostrarPorId($fkproducto));

//identifico el dato del precio
$precio = $datosProducto['precio'];

//calculamos el subtotal
$subtotal = $precio * $cantidad;

//enviamos los tados que obtubimos en diferentes formas arriba
$respuesta = $producto->agregarCarrito($fkventa, $fkproducto, $cantidad, $subtotal);

if ($respuesta){
    echo "<div style='background-color: green; font-size:30px; color:white; padding:20px;'>Agregado al carrito</div>";
}else{
    echo "Hubo un error al agregar el producto al carrito";
}

?>