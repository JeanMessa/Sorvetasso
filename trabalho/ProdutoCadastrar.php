<?php
    
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $sabor = $_POST['sabor'];
        $preco = floatval($_POST['preco']);
        $descricao = $_POST['descricao'];
        require 'run.php';
        $produto = new Produto();
        $cod_produto = $produto->adicionar($nome,$sabor,$preco,$descricao);
        if(isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])){
            $extensao = pathinfo($_FILES['img']['tmp_name'],PATHINFO_EXTENSION);
            $arquivo  = md5(date('Ymdhis').rand(111,999)).'.'.$extensao;		
            copy($_FILES['img']['tmp_name'],'media/'.$arquivo);
            
        }else {
            $arquivo = "default.png";
        }
        
        $produto->imagem($cod_produto, $arquivo);
    }


    header("Location: index.php");
?>