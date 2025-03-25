<?php 
    if(!isset($_GET['cod'])){
        header("Location: index.php");
    }else{
        require 'run.php';
        $produto  = new Produto();
        $dados = $produto->get($_GET['cod']);
    }
    require('head.php');
?>
<html>
    <?php require('menu.php'); ?>
    <div class="corpo">
        <div class="container desc">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <img  src="<?php echo 'media/' .$dados['url_img'];?>" class="imagem-detalhes"> 
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="linha">Nome: <?php echo $dados['nome'];?></div>
                    <div class="linha">Sabor: <?php echo $dados['sabor'];?></div>
                    <div class="linha">Preço: <?php echo "R$ " . number_format($dados['preco'],2,",",".");?></div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div>Descrição: <?php echo $dados['descricao'];?></div>
                </div>
            </div>
        </div>
        <div class="container botoes">
            <a class="btn btn-primary btn-lg botao" href="index.php">Voltar</a>
            <a class="btn btn-warning btn-lg botao" href="produto_editar.php?cod=<?php echo $dados['cod_produto'];?>">Editar</a>
            <a class="btn btn-danger btn-lg botao" href="ProdutoExcluir.php?cod=<?php echo $dados['cod_produto'];?>" class="btn btn-danger" onclick="return confirm('Deseja Excluir?');">Excluir</a>
            <a href="produto_adicionar_carrinho.php?cod=<?php echo $dados['cod_produto'];?>" class="btn btn-primary btn-lg botao" style="color:white">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>+
            </a>                
        </div>
    </div>

    
</html>