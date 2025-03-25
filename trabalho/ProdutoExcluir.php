<?php
    $cod_produto = $_GET['cod'];

    if(isset($cod_produto) && !empty($cod_produto)){
        require 'run.php';
        $produto = new Produto();
        $produto->excluir($cod_produto);
    }

    header("Location: index.php")
?>