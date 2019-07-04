<?php

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: /almoxarifado/index.php?erro=1');
    }
    require_once '../controller/contemController.php';


    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listar' : 
                listar();
                break;
            case 'info' : 
                info($_POST['id']);
                break;
            case 'atualiza' : 
                atualiza($_POST['id'], $_POST['nome'], $_POST['gerente']);
                break;
            case 'create' : 
                create($_POST['nome'], $_POST['gerente']);
                break;
            case 'delete' : 
                delete($_POST['id']);
                break; 
            case 'local' : 
                local();
                break;
            case 'contar' : 
                cont();
                break;
            }
    }
    function atualiza($id, $nome, $gerente){
        $obj = new ContemController();
        return $obj->update($id, $nome, $gerente);
    }
    function info($id){
        $obj = new ContemController();
        return $obj->info($id);
    }
    function listar(){
        $obj = new ContemController();
        return $obj->listar();
    }
    function local(){
        $obj = new ContemController();
        return $obj->local();
    }

    function cont(){
        $obj = new ContemController();
        return $obj->count();
    }
    function create($nome, $gerente){
        $obj = new ContemController();
        return $obj->create($nome, $gerente);
    }
    function delete($id){
        $obj = new ContemController();
        return $obj->delete($id);
    }
?>