<?php

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/pecaController.php';
    require_once '../controller/contemController.php';

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listarPecas' : 
                listarPecas();
                break;
            case 'infopeca' : 
                infopeca();
                break;
            case 'atualizapeca' : 
                atualizaPecas($_POST['idAtual'], $_POST['upc'], $_POST['descricao'], $_POST['receptaculo']);
            break;
            case 'delete' : 
                delete();
                break;
            case 'create' : 
                create($_POST['upc'], $_POST['descricao'], $_POST['corredor'], $_POST['receptaculo']);
                break;
            case 'getLocal':
                getLocal($_POST['id']);
                break;
        }
    }
    function getLocal($id){
        
        $obj = new pecaController();
        return $obj->local($id);
    }

    function atualizaPecas($idAtual, $upc, $descricao, $receptaculo){
        
        $obj = new pecaController();
        $obj->atualiza($idAtual, $upc, $descricao);
        $contem = new ContemController();
        $contem->update($receptaculo, $idAtual);
    
    }

    
    function listarPecas(){
        
        $obj = new pecaController();
        return $obj->listar();
    }
    function infopeca(){
        
        $obj = new pecaController();
        return $obj->info($_POST['id']);
    }

    function delete(){
        
        $obj = new pecaController();
        return $obj->delete($_POST['id']);
    }
    function create($upc, $descricao, $corredor, $receptaculo){
        
        $peca = new pecaController();
        $peca->create($upc, $descricao);
        $contem = new ContemController();
        $contem->create($receptaculo);
        
    }

?>