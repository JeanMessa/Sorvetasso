<?php
    class Produto extends model{
        public function getAll(){
            $array = array();
            $sql = "SELECT * FROM PRODUTO ORDER BY nome desc";
            $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
            return $array;
        }

        public function get($cod_produto){
            $array = array();
            $sql = "SELECT * FROM produto where cod_produto = :cod_produto";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cod_produto",$cod_produto);
            $sql->execute();
            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }
            return $array;
        } 

        public function adicionar($nome,$sabor,$preco,$descricao){
            $sql = 'Insert into produto (nome,sabor,preco,descricao) values(:nome,:sabor,:preco,:descricao)';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":sabor",$sabor);
            $sql->bindValue(":preco",$preco);
            $sql->bindValue(":descricao",$descricao);
            $sql->execute();
            return $this->db->LastInsertId();
        }

        public function imagem($cod_produto,$url_img){
            $sql = 'Update produto Set url_img=:url_img where cod_produto = :cod_produto';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":url_img",$url_img);
            $sql->bindValue(":cod_produto",$cod_produto);
            $sql->execute();
        }

        public function editar($cod_produto,$nome,$sabor,$preco,$descricao){
                $sql = 'Update produto Set nome=:nome, sabor=:sabor, preco=:preco, descricao=:descricao where cod_produto = :cod_produto';
                $sql = $this->db->prepare($sql);
                $sql->bindValue(":nome",$nome);
                $sql->bindValue(":sabor",$sabor);
                $sql->bindValue(":preco",$preco);
                $sql->bindValue(":descricao",$descricao);
                $sql->bindValue(":cod_produto",$cod_produto);
                $sql->execute();
        }

        public function excluir($cod_produto){
            $sql = 'Delete from produto where cod_produto = :cod_produto';
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":cod_produto",$cod_produto);
            $sql->execute();
        }
    }

?>