<?php
    
    require_once '../controller/funcionarioController.php';
    require_once '../controller/setorController.php';
    $_POST['cpf'] = '12345678912';

    $obj = new FuncionarioController();
    $obj->listar();


    // $obj = new SetorController();
    // $obj->listar();
?>