<?php
    require 'run.php';

    $produto  = new Produto();
    $dados = $produto->getAll();
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array(); 
    }
?>
<html>
    <?php require 'head.php'; ?>
    <body>
        <?php require 'menu.php'; ?>
        <div class="corpo">
            <table class="table table-primary table-striped">
                <tr>
                    <th>Produto</th>
                    <th>Recipiente</th>
                    <th>Qtd</th>
                    <th>Preco</th>
                    <th></th>
                </tr>
                <?php 
                    $qtd_total = 0;
                    $preco_total = 0;
                    foreach ($_SESSION['carrinho'] as $key => $item): 
                ?>
                    <tr>
                        <?php 
                            $item_produto = $produto->get($item['cod_produto']);
                            $qtd_total += $item['qtd'];
                            $preco_total+= str_replace(",",".",substr($item['preco'],3));
                        ?>
                        <td><?php echo $item_produto['nome'] ?></td>
                        <td><?php echo $item['recipiente'] ?></td>
                        <td><?php echo $item['qtd'] ?></td>
                        <td><?php echo $item['preco'] ?></td>
                        <td class="text-center"><a class="btn btn-danger"href="RemoverCarrinho.php?cod=<?php echo $key?>">Remover</a></td>
                    </tr>
                <?php endforeach ?>  
                <tr>
                    <th>Total</th>
                    <th>------------</th>
                    <th><?php echo $qtd_total ?></th>
                    <th><?php echo "R$ " . number_format($preco_total,2,",","."); ?></th>
                    <td class="text-center"><a  class="btn btn-success <?php if(empty($_SESSION['carrinho'])){echo "disabled";} ?>"href="FinalizarCompra.php">Finalizar Compra</a></td>
                </tr>                              
            </table>
        </div>
    </body>   

</html>