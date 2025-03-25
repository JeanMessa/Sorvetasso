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
    <?php require 'head.php'; ?>   
    <body>
        <?php require 'menu.php'; ?>
        <div class="corpo">
            <h3 class="text-center">Editar Produto</h3>
            <form method='post' action="ProdutoEditar.php?cod=<?php echo $dados['cod_produto'];?>" enctype = "multipart/form-data" class="form-control formulario">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12" >
                            <label>Nome:</label>
                            <input value= "<?php echo $dados['nome'];?>" type="text" name="nome" required placeholder="Digite o nome comercial do produto" class="form-control">
                            <label>Preço (R$):</label>
                            <input value= "<?php echo $dados['preco'];?>" type="number" name="preco" id="preco" required placeholder="Digite o preço do produto" class="form-control" step="00.01">
                        </div>    
                        <div class="col-lg-6 col-md-6 col-sm-12" >
                            <label>Sabor:</label>
                            <input value= "<?php echo $dados['sabor'];?>" type="text" name="sabor" required placeholder="Digite o sabor do produto" class="form-control">
                            <label>Imagem:</label>
                            <input type="file" name="img"  class="form-control">
                        </div>       
                        <div class="col-lg-12 col-md-12 col-sm-12" >
                            <label>Descrição:</label>
                            <textarea name="descricao" cols="30" rows="8"required placeholder="Digite a descrição do produto" class="form-control desc"><?php echo $dados['descricao'];?></textarea>
                        </div> 
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" >
                            <div class ='botao'>
                                <a class="btn btn-primary" href="index.php">Voltar</a>
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </body>
</html>