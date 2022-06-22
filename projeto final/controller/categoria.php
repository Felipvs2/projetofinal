<?php
require "../conexao.php";
require "../model/categoria_model.php";

$model = new categoriaModel($con);
//$model->inserir("Produto de Limpeza");
//$model->excluir(1);
//$model->atualizar("Smartphone", 2);
var_dump($model->buscarPORID(2));

?>
