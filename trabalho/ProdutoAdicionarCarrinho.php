<?php
    if(isset($_POST['preco']) && isset($_GET['cod'])){
        session_start();
        $array = array('cod_produto' => $_GET['cod'],'preco' => $_POST['preco'],'qtd' => $_POST['qtd'],'recipiente' => $_POST['recipiente'],);
        if(!isset($_SESSION['carrinho'])){
            print_r($_POST);
            $_SESSION['carrinho'] = array(); 
        }
        array_push($_SESSION['carrinho'],$array);
    }
    header("Location: carrinho.php");
?>