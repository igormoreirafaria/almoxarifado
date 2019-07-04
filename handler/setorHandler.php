<?php

    // ini_set('display_startup_errors', 1);
    // ini_set('display_errors', 1);
    // error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: /almoxarifado/index.php?erro=1');
    }
    require_once '../controller/setorController.php';


    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listarSetor' : 
                listarSetor();
                break;
            case 'infoSetor' : 
                infoSetor($_POST['id']);
                break;
            case 'atualizaSetor' : 
                atualizaSetor($_POST['id'], $_POST['nome'], $_POST['gerente']);
                break;
            case 'create' : 
                create($_POST['nome'], $_POST['gerente']);
                break;
            case 'delete' : 
                delete($_POST['id']);
                break; 
        }
    }
    function atualizaSetor($id, $nome, $gerente){
        $obj = new SetorController();
        return $obj->update($id, $nome, $gerente);
    }
    function infoSetor($id){
        $obj = new SetorController();
        return $obj->info($id);
    }
    function listarSetor(){
        $obj = new SetorController();
        return $obj->listar();
    }
    function create($nome, $gerente){
        $obj = new SetorController();
        return $obj->create($nome, $gerente);
    }
    function delete($id){
        $obj = new SetorController();
        return $obj->delete($id);
    }
?>