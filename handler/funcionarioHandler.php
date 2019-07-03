<?php

    // ini_set('display_startup_errors', 1);
    // ini_set('display_errors', 1);
    // error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/funcionarioController.php';

    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'listarFuncionario' : 
                listarFuncionario();
                break;
            case 'infoFuncionario' : 
                infoFuncionario();
                break;
            case 'atualizaFuncionario' : 
                atualizaFuncionario($_POST['cpfAtual'], $_POST['cpf'], $_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['setor']);
                break;
            
        }
    }




    
    function listarFuncionario(){
        
        $obj = new FuncionarioController();
        return $obj->listar();
    }
    function infoFuncionario(){
        
        $obj = new FuncionarioController();
        return $obj->info($_POST['cpf']);
    }
    function atualizaFuncionario($cpfAtual, $cpf, $nome, $login, $senha, $setor){
        
        $obj = new FuncionarioController();
        return $obj->atualiza($cpfAtual, $cpf, $nome, $login, $senha, $setor);
    }
?>