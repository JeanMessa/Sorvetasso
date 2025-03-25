<html>
    <?php require 'head.php'; ?>   
    <body>
        <?php require 'menu.php'; ?>
        <div class="corpo">
            <h3 class="text-center">Cadastrar Produto</h3>
            <form method='post' action="ProdutoCadastrar.php" enctype = "multipart/form-data" class="form-control formulario">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12" >
                            <label>Nome:</label>
                            <input type="text" name="nome" required placeholder="Digite o nome comercial do produto" class="form-control">
                            <label>Preço (R$):</label>
                            <input type="number" name="preco" id="preco" required placeholder="Digite o preço do produto" class="form-control" step="00.01">
                        </div>    
                        <div class="col-lg-6 col-md-6 col-sm-12" >
                            <label>Sabor:</label>
                            <input type="text" name="sabor" required placeholder="Digite o sabor do produto" class="form-control">
                            <label>Imagem:</label>
                            <input type="file" name="img"  class="form-control">
                        </div>       
                        <div class="col-lg-12 col-md-12 col-sm-12" >
                            <label>Descrição:</label>
                            <textarea name="descricao" cols="30" rows="8"required placeholder="Digite a descrição do produto" class="form-control desc"></textarea>
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