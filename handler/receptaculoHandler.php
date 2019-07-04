<?php

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: /almoxarifado/index.php?erro=1');
    }
    require_once '../controller/receptaculoController.php';


    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listarReceptaculo' : 
                listarReceptaculo();
                break;
            case 'infoReceptaculo' : 
                infoReceptaculo($_POST['id']);
                break;
            case 'atualizaReceptaculo' : 
                atualizaReceptaculo($_POST['id'], $_POST['corredor']);
                break;
            case 'create' : 
                create($_POST['corredor']);
                break;
            case 'delete' : 
                delete($_POST['id']);
                break; 
        }
    }
    function atualizaReceptaculo($id, $corredor){
        $obj = new ReceptaculoController();
        return $obj->update($id, $corredor);
    }
    function infoReceptaculo($id){
        $obj = new ReceptaculoController();
        return $obj->info($id);
    }
    function listarReceptaculo(){
        $obj = new ReceptaculoController();
        return $obj->listar();
    }
    function create($corredor){
        $obj = new ReceptaculoController();
        return $obj->create($corredor);
    }
    function delete($id){
        $obj = new ReceptaculoController();
        return $obj->delete($id);
    }
?>