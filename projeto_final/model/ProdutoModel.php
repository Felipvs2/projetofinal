<?php

    require_once 'config/Conexao.php';

    class ProdutoModel{

        function __construct()
        {
            $this->conexao = Conexao::getConnection();
        }

        function inserir($nome, $descricao, $preco, $marca, $foto, $idcategoria){
            $sql = "INSERT INTO produto (nome, descricao, preco , marca , foto , categoria_idcategoria ) value (?, ?, ?, ?, ?, ?)";
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param('ssdssi', $nome, $descricao, $preco, $marca, $foto, $idcategoria);
            $comando->execute();
        }

        function excluir($id){
            $sql = 'DELETE FROM produto WHERE idproduto = ?';
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param('i', $id);
            $comando->execute();
        }

        function atualizar($id, $nome, $descricao, $preco, $marca, $foto, $idcategoria){
            $sql = 'UPDATE produto SET nome = ?, descricao =?, preco=?, marca=? foto=?, idcategoria=? WHERE idproduto = ?';
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param('ssdssii', $nome, $descricao, $preco, $marca, $foto, $idcategoria, $id);
            $comando->execute();
        }

        function buscarPorId($id){
            $sql = 'SELECT * FROM produto WHERE idproduto = ?';
            $comando = $this->conexao->prepare($sql);
            $comando->bind_param('i', $id);
            if ($comando->execute()){
                $resultado = $comando->get_result();
                return $resultado->fetch_assoc();
            }
            return null;
        }

        function buscarTodos(){
            $sql = 'SELECT * FROM produto';
            $comando = $this->conexao->prepare($sql);
            if ($comando->execute()){
                $resultados = $comando->get_result();
                return $resultados->fetch_all(MYSQLI_ASSOC);
            }
            return null;
        }
    }

    //$model->inserir("Produto de limpeza"); adiciona o objeto Produto.
    //$model->excluir(1); exclui o produto 1.
    //$model->atualizar(2, 'Smartphone'); atualiza o produto do id=2 para Smartphone.
    //print_r(model->buscarPorId(2)); exibe o produto do id=2.

?>