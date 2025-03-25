<?php
    require 'run.php';
    if(!isset($_GET['status'])){
        header("Location:visualizar_pedidos.php?status=pendente");
    }
    $pedido  = new Pedido();
    $dados = $pedido->getAll($_GET['status']);
    
?>
<html>
    <?php require 'head.php'; ?>
    <body>
        <?php require 'menu.php'; ?>
        <div class="corpo">
            <div class="seletor">
                <a href="visualizar_pedidos.php?status=pendente" class="col text-center selecionar <?php if($_GET['status']== 'pendente'){ echo 'selecionado';} ?>">
                    Pendentes
                </a>
                <a href="visualizar_pedidos.php?status=aprovado" class="col text-center selecionar <?php if($_GET['status']== 'aprovado'){ echo 'selecionado';} ?>">
                    Aprovados
                </a>
                <a href="visualizar_pedidos.php?status=finalizado" class="col text-center selecionar <?php if($_GET['status']== 'finalizado'){ echo 'selecionado';} ?>">
                    Finalizados
                </a>
                <a href="visualizar_pedidos.php?status=reprovado" class="col text-center selecionar <?php if($_GET['status']== 'reprovado'){ echo 'selecionado';} ?>">
                    Reprovados
                </a>
            </div>
            <table class="table table-success">
                <tr>
                    <th>Cod do Pedido</th>
                    <th>Qtd Total</th>
                    <th>Preco Total</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($dados as $item):?>
                    <tr>
                        <td><?php echo $item['cod_pedido'] ?></td>
                        <td><?php echo $item['qtd_total'] ?></td>
                        <td><?php echo "R$ " . number_format($item['preco_total'],2,",",".");?></td>
                        <td><?php echo $item['status'] ?></td>
                        <td class="verificar"><button class="btn btn-link" onclick="mostra(this.id,<?php echo $item['cod_pedido']?>)" id="link<?php echo $item['cod_pedido']?>">
                            Verificar Itens
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button></td>
                        <?php if($item['status']== "Pendente"):?>
                            <td class="text-center"><a class="btn btn-success"href="StatusPedido?cod=<?php echo $item['cod_pedido'] . "&status=Aprovado"?>">Aprovar</a></td>
                            <td class="text-center"><a class="btn btn-danger"href="StatusPedido?cod=<?php echo $item['cod_pedido'] . "&status=Reprovado"?>">Reprovar</a></td>
                        <?php elseif($item['status']== "Aprovado"):?>
                            <td class="text-center"><a class="btn btn-warning"href="StatusPedido?cod=<?php echo $item['cod_pedido'] . "&status=Pendente"?>">Pendência</a></td>
                            <td class="text-center"><a class="btn btn-success"href="StatusPedido?cod=<?php echo $item['cod_pedido'] . "&status=Finalizado"?>">Finalizar</a></td>
                        <?php elseif($item['status']== "Reprovado" || $item['status']== "Finalizado"):?>
                            <td></td>
                            <td class="text-center"><a class="btn btn-warning"href="StatusPedido?cod=<?php echo $item['cod_pedido'] . "&status=Pendente"?>">Pendência</a></td>
                        <?php endif ?>
                    </tr>
                    <tr class = "table-success oculto tabela<?php echo $item['cod_pedido']?>">
                        <th class="coluna-transparente"></th>
                        <th>Produto</th>
                        <th>Recipiente</th>
                        <th>Qtd</th>
                        <th>Preco</th>
                        <th class="coluna-transparente"></th>
                        <th class="coluna-transparente"></th>
                    </tr>    
                    <?php 
                        $item_pedido  = new ItemPedido();
                        $dados_ip = $item_pedido->getAllIntoPedido($item['cod_pedido']);
                        foreach ($dados_ip as $item_ip): 
                    ?>
                        <tr class = "table-success oculto tabela<?php echo $item['cod_pedido']?>">        
                            <td class="coluna-transparente"></td>                      
                            <td><?php echo $item_ip['nome'] ?></td>
                            <td><?php echo $item_ip['recipiente'] ?></td>
                            <td><?php echo $item_ip['qtd'] ?></td>
                            <td><?php echo "R$ " . number_format($item_ip['preco'],2,",",".") ?></td>
                            <td class="coluna-transparente"></td>
                            <td class="coluna-transparente"></td>
                        </tr>
                    <?php endforeach ?> 
                <?php endforeach ?>                              
            </table>
        </div>
    </body>
    <script>
        function mostra(id,cod) {
            if((document.getElementById(id).innerHTML).includes("Verificar")){
                document.getElementById(id).innerHTML = 'Ocultar Itens <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/></svg>';
                var colecao = document.getElementsByClassName("tabela"+cod);
                for (let item of colecao) {
                    item.style.visibility = "visible";
                }
            }else{
                document.getElementById(id).innerHTML = 'Verificar Itens <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg>';
                var colecao = document.getElementsByClassName("tabela"+cod);
                for (let item of colecao) {
                    item.style.visibility = "collapse";
                }
            }
        }

        
    </script>   

</html>