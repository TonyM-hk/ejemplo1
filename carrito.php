<?php

include('clasesa/venta.php');
$venta=new Venta();

//busco la venta
$datos=$venta->mostrarVenta(1,0);

?>
<h2>Carrito de compras</h2>
<table>
    <tr>
<!--colspan define el numero de columnas combinadas-->
        <th colspan="2">Producto</th>
        <th>Cantidad</th>
        <th>Importe</th>
    </tr>
</table>

<?php 
foreach($datos as $fila){
    }
?>

<tr>
    <td><?=$fila['nombre']?></td>
    <td><?=$fila['cantidad']?></td>
    <td><?=$fila['subtotal']?></td>


</tr>

<?php 

?>