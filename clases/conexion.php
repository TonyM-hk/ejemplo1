<?php

class Conexion extends mysqli{

    function __construct(){
        parent::__construct('localhost:3307','root','','tienda');
    
    }
}

?>