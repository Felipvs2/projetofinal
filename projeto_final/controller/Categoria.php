<?php

    require "model/CategoriaModel.php";
    require "Controller/Controller.php";

    class Categoria extends Controller{

        function __construct(){
            
            $this->model = new CategoriaModel();
        }

        function index(){
            $categorias = $this->model->buscarTodos();
            $this->load_template("categoria/listagem.php", $categorias);
            
        }

        function inserir(){
            
           
        }
    }

    //codigos para mexer no bd!
    //$model->inserir("Produto de Limpeza");
    //$model->excluir(1);
    //$model->atualizar("Smartphone", 2);
    //var_dump($model->buscarPorId(2));
?>