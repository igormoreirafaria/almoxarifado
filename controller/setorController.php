<?php
    require_once '../model/setor.class.php';
    class SetorController {

        public function listar() {
            $setor = new Setor();
            
            $setores = $setor->listAll();
            
            $_REQUEST['setores'] = $setores;

            //require_once '../view/editar-funcionario.php';
        }

        public function update() {
            
            
            
        }

        public function info() {
           
        }
    }
?>