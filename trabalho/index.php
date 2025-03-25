<?php
    require 'run.php';

    $produto  = new Produto();
    $dados = $produto->getAll();
?>
<html>
    <?php require 'head.php'; ?>   
    <body>
        <?php require 'menu.php'; ?>   
        <div class = "corpo">
            <div class="container">
                <div class= "row">
                    <?php foreach ($dados as $item): ?>
                        <div class= "col-lg-4 col-md-6 col-sm-12 quadros">
                            <a href="produto_detalhes.php?cod=<?php echo $item['cod_produto'] ?>">
                                <div class= "quadro ">
                                    <div class="text-center">
                                        <img  src="<?php echo 'media/' .$item['url_img'];?>" class="imagem text-center"> 
                                    </div>
                                    <div class= "quadro-desc">
                                        <div class = "linha-topo text-center">
                                            <?php echo $item['nome'];?>
                                            
                                        </div>
                                        <div class = "linha-baixo">
                                            <?php echo "R$ " . number_format($item['preco'],2,",",".");?>
                                            <a href="produto_adicionar_carrinho.php?cod=<?php echo $item['cod_produto'];?>" class="btn btn-primary" style="color:white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                                                </svg>+
                                            </a>
                                        </div>
                                    </div>                        
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </body>
</html>