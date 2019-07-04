<?php
    require_once '../model/receptaculo.class.php';
    class ReceptaculoController {

        public function listar() {
            $receptaculo = new Receptaculo();
            
            $receptaculos = $receptaculo->listAll();
            
            $res = [];
            foreach ($receptaculos as $rec) {
                array_push($res, $rec->jsonSerialize());
            }
            
            echo json_encode($res);

        }

        public function update($id, $corredor) {
            
        }
        public function create($id, $corredor) {

            $receptaculo = new Recptaculo();
            $receptaculo->setId($id);
            $receptaculo->setCorredor($corredor);
            $rec = $receptaculo->save();
            echo json_encode($rec);
            
        }
        public function info($id) {
            
        }
        public function delete($id) {
            
        }
    }
?>