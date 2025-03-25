<?php
    $cod_produto = $_GET['cod'];

    if(isset($cod_produto)){
        session_start();
        unset($_SESSION['carrinho'][$cod_produto]);
        print_r($_SESSION['carrinho']);
    }
    header("Location: carrinho.php")
?>