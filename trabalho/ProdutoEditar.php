<?php
    
    if(isset($_POST['nome']) && isset($_GET['cod'])){
        $nome = $_POST['nome'];
        $sabor = $_POST['sabor'];
        $preco = floatval($_POST['preco']);
        $descricao = $_POST['descricao'];
        $cod_produto = $_GET['cod'];
        require 'run.php';
        $produto = new Produto();
        $produto->editar($cod_produto,$nome,$sabor,$preco,$descricao);
    }
    if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){
        print_r($_FILES);
        $extensao = pathinfo($_FILES['img']['tmp_name'],PATHINFO_EXTENSION);
        $arquivo  = md5(date('Ymdhis').rand(111,999)).'.'.$extensao;		
        copy($_FILES['img']['tmp_name'],'media/'.$arquivo);
        $produto->imagem($cod_produto, $arquivo);
    }

    header("Location: index.php");
?>