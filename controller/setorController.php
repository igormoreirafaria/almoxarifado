<?php
    require_once '../model/setor.class.php';
    class SetorController {

        public function listar() {
            $setor = new Setor();
            
            $setores = $setor->listAll();
            
            $res = [];
            foreach ($setores as $set) {
                array_push($res, $set->jsonSerialize());
            }
            
            echo json_encode($res);

        }

        public function update() {
            
            
            
        }

        public function info() {
           
        }
    }
?>