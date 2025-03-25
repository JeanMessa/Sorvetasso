<?php
    
    if(isset($_GET['cod']) && isset($_GET['status'])){
        $cod_pedido = $_GET['cod'];
        $status = $_GET['status'];
        require 'run.php';
        $pedido = new Pedido();
        $pedido->alterar_status($cod_pedido,$status);
    }

    header("Location: visualizar_pedidos.php");
?>