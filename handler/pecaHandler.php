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
            
            
        }
    }




    
    function listarPecas(){
        
        $obj = new pecaController();
        return $obj->listar();
    }
    function infopeca(){
        
        $obj = new pecaController();
        return $obj->info($_POST['id']);
    }



    // $objSet = new SetorController();
    // $objSet->listar();

    // $pecas = $_REQUEST['pecas'];
    // $setores = $_REQUEST['setores'];
?>