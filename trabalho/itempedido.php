<?php
    class ItemPedido extends model{
        public function adicionar($recipiente,$qtd,$preco,$cod_pedido,$cod_produto){
            $sql = 'Insert into item_pedido (recipiente,qtd,preco,cod_pedido,cod_produto) values(:recipiente,:qtd,:preco,:cod_pedido,:cod_produto)';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":recipiente",$recipiente);
            $sql->bindValue(":qtd",$qtd);
            $sql->bindValue(":preco",$preco);
            $sql->bindValue(":cod_pedido",$cod_pedido);
            $sql->bindValue(":cod_produto",$cod_produto);
            $sql->execute();
            return $this->db->LastInsertId();
        }

        public function getAllIntoPedido($cod_pedido){
            $array = array();
            $sql = "SELECT pr.nome,ip.recipiente, ip.qtd, ip.preco
                    FROM item_pedido ip, produto pr 
                    WHERE ip.cod_pedido = :cod_pedido and ip.cod_produto = pr.cod_produto
                    ORDER BY ip.cod_item";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cod_pedido",$cod_pedido);        
            $sql->execute();
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
            return $array;
        }
    }
?>