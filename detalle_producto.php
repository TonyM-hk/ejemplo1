<?php
    include('menu.php');
    include('clases/producto.php');
    $producto= new Producto();

    //recibo el id que le envié desde el index.
    $idproducto= $_GET['producto'];

    //mando el id a una función para que me arroje los datos de ese producto en específico.
    $datos= mysqli_fetch_assoc($producto->mostrarPorId($idproducto));
?>
<script src="js/jquery.js"></script>
<style>
    .cuadro{
        display: inline-block;
        width: 40%;
        padding: 30px;
        /* border: black 2px solid;
        margin: 20px;
        text-align: center; */
    }

</style>

<div>
    <div class="cuadro">
    <img src="img/<?=$datos['ruta']?>" width="400px" alt="">
    </div class="cuadro">
        
    <div class="cuadro">
        <h2><?=$datos['nombre']?></h2>
        <h4><?=$datos['precio']?></h4>
        <p><?=$datos['descripcion']?></p>

        <form id="formulario"  method="POST">
            <input type="hidden" name="fkproducto" value="<?=$datos['idproducto']?>">
            <input type="number" name="cantidad" value="1">
            
            <button type="submit">Agregar al Carrito</button>
           
        </form> 
        <div id="respuesta"></div>
    </div>
</div>
<script>
$('#formulario').on('submit',function(e){
    e.preventDefault();
    $.ajax({
        type:'POST',
        url:'controladores/agregar_carrito.php',
        data:$('#formulario').serialize(),
        dataType:'html',
        error:function(){
            alert('Hubo un error');
        },
        success:function(resultado){
          $('#respuesta').html(resultado).fadeIn();
        } 
    })
   
})
</script>
<?php
    include('footer.php');
?>