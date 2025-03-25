<?php
    
    require 'run.php';
    if(!empty($_SESSION['carrinho'])){
        $pedido = new Pedido();
        $qtd_total = 0;
        $preco_total = 0;
        foreach ($_SESSION['carrinho'] as $key => $item){

            $qtd_total += $item['qtd'];
            $preco_total+= str_replace(",",".",substr($item['preco'],3));
        } 
        $cod_pedido = $pedido->adicionar($qtd_total,$preco_total);

        foreach ($_SESSION['carrinho'] as  $item){
            $item_pedido = new ItemPedido();
            $recipiente = $item['recipiente'];
            $qtd = $item['qtd'];
            $preco = str_replace(",",".",substr($item['preco'],3));
            $cod_produto = $item['cod_produto'];
            $item_pedido->adicionar($recipiente,$qtd,$preco,$cod_pedido,$cod_produto);
        }
        unset($_SESSION['carrinho']);
    }
    
    header("Location: carrinho.php");
?>