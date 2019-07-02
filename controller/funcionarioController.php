<?php
    require_once '../model/funcionario.class.php';
    class FuncionarioController {

        public function listar() {
            
            $funcionario = new Funcionario();
            
            $funcionarios = $funcionario->listAll();

            $_REQUEST['funcionarios'] = $funcionarios;
            require_once '../view/listar-funcionarios.php';
        }

        public function update() {
            
            
            
        }
    }
?>