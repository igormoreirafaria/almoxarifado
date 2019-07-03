<?php

    
    require_once '../model/funcionario.class.php';
    class FuncionarioController {

        public function listar() {
            
            $funcionario = new Funcionario();
            
            $funcionarios = $funcionario->listAll();
            
            $res = [];
            foreach ($funcionarios as $funcionario) {
                array_push($res, $funcionario->jsonSerialize());
            }

            echo json_encode($res);

        }

        public function atualiza($cpfAtual, $cpf, $nome, $login, $senha, $setor) {
            $funcionario = new Funcionario();
            $funcionario->construtor($cpf, $nome, $login, $senha, $setor);
            $func = $funcionario->editar($cpfAtual);
            echo $func;
            
        }

        public function info($cpf) {
            $funcionario = new Funcionario();
            $func = $funcionario->info($cpf);
            echo json_encode($func->jsonSerialize());
        }

        public function validaLogin(){
            $funcionario = new Funcionario();
            $func = $funcionario->validaLogin();
            echo json_encode($func);
        }
    }
?>