<?php

    // ini_set('display_startup_errors', 1);
    // ini_set('display_errors', 1);
    // error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/pecaController.php';

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
                atualizaPecas($_POST['idAtual'], $_POST['id'], $_POST['upc'], $_POST['descricao']);
            break;
            case 'delete' : 
                delete();
                break;
            case 'create' : 
                create($_POST['id'], $_POST['upc'], $_POST['descricao']);
                break;
            
        }
    }


    function atualizaPecas($idAtual, $id, $upc, $descricao){
        
        $obj = new pecaController();
        return $obj->atualiza($idAtual, $id, $upc, $descricao);
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
    function create($id, $upc, $descricao){
        
        $obj = new pecaController();
        return $obj->create($id, $upc, $descricao);
    }



    // $objSet = new SetorController();
    // $objSet->listar();

    // $pecas = $_REQUEST['pecas'];
    // $setores = $_REQUEST['setores'];
?>