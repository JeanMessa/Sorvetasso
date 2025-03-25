<?php
    class Pedido extends model{

        public function getAll($status){
            $array = array();
            $sql = "SELECT * FROM pedido  WHERE lower(pedido.status)=:status_pedido ORDER BY cod_pedido";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":status_pedido",$status);
            $sql->execute();
            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
            return $array;
        }

        public function adicionar($qtd_total,$preco_total){
            $sql = 'Insert into pedido (qtd_total,preco_total) values(:qtd_total,:preco_total)';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":qtd_total",$qtd_total);
            $sql->bindValue(":preco_total",$preco_total);
            $sql->execute();
            return $this->db->LastInsertId();
        }

        public function alterar_status($cod_pedido,$status){
            $sql = 'Update pedido Set status=:status where cod_pedido = :cod_pedido';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":status",$status);
            $sql->bindValue(":cod_pedido",$cod_pedido);
            $sql->execute();
        }
    }
?>