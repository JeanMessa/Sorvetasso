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
        <form action="ProdutoAdicionarCarrinho.php?cod=<?php echo $dados['cod_produto'] ?>" method="post">
            <div class="container desc">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <img  src="<?php echo 'media/' .$dados['url_img'];?>" class="imagem-detalhes"> 
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="linha">Nome: <?php echo $dados['nome'];?></div>
                        <div class="linha">Sabor: <?php echo $dados['sabor'];?></div>
                        <div class="linha">Preço: <input id='preco' name='preco' type="text" value="<?php echo "R$ " . number_format($dados['preco'],2,",",".");?>" disabled></div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div>Descrição: <?php echo $dados['descricao'];?></div>
                    </div>
                </div>
            </div>
            <div class="form-carrinho form-control">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label> Quantidade:</label>
                            <input type="number" name="qtd" id="qtd" min='1' required onchange="atualiza_preco_qtd()" class="form-control" step="1" value='1'>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label> Recipiente:</label>
                            <select onchange="atualiza_preco_recipiente()" name="recipiente" id="recipiente" class="form-control">
                                <option value="Copo">Copo</option>
                                <option value="Casquinha">Casquinha</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                            <button onclick="habilita()"class="btn btn-success" type="submit">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
    </div>
    <script>
        var preco = document.getElementById('preco').value;
        preco = parseFloat(preco.replace("R$","").replace(",","."));
        var recipiente = "Copo";

        function atualiza_preco_qtd() {
            preco_atual = preco * document.getElementById('qtd').value;
            document.getElementById('preco').value = "R$ " + String(preco_atual).replace(".",",");
            if(!document.getElementById('preco').value.includes(',')){
                document.getElementById('preco').value += ",00";
            }else if(document.getElementById('preco').value.indexOf(',')-document.getElementById('preco').value.length == -2){
                document.getElementById('preco').value += "0";
            }
        }

        function atualiza_preco_recipiente() {
            if((recipiente == "Casquinha") && (document.getElementById('recipiente').value=='Copo')){
                preco-=5;
                recipiente = "Copo";
            }else if((recipiente == "Copo") && (document.getElementById('recipiente').value=='Casquinha')){
                preco+=5;
                recipiente = "Casquinha";
            }
            atualiza_preco_qtd();
        }

        function habilita(){
            document.getElementById('preco').disabled = false;
        }
    </script>
</html>
