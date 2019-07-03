<?php

    // ini_set('display_startup_errors', 1);
    // ini_set('display_errors', 1);
    // error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/setorController.php';


    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listarSetor' : 
            listarSetor();
                break;
            
            
        }
    }




    
    function listarSetor(){
        
        $obj = new SetorController();
        return $obj->listar();
    }
?>