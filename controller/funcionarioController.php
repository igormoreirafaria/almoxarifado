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
            
            echo "entra";
            
        }

        public function info($cpf) {
            $funcionario = new Funcionario();
            $_REQUEST['funcionario'] = $funcionario->info($cpf);
            require_once '../view/editar-funcionario.php';
        }
    }
?>