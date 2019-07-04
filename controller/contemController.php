<?php
    require_once '../model/contem.class.php';
    class ContemController {

        public function listar() {
            $contem = new Contem();
            
            $contem = $contem->listAll();
            
            $res = [];
            foreach ($contem as $rec) {
                array_push($res, $rec->jsonSerialize());
            }
            
            echo json_encode($res);

        }

        public function update($receptaculo, $idAtual) {
            $contem = new Contem();
            $contem->setReceptaculo($receptaculo);
            $contem->setPecas($idAtual);
            $rec = $contem->editar();
            echo json_encode($rec);
        }
        public function create($receptaculo) {

            $contem = new Contem();
            $contem->setReceptaculo($receptaculo);
            $rec = $contem->save();
            echo json_encode($rec);
            
        }
        public function local() {
            $contem = new Contem();
            $res =$contem->local();
            echo json_encode($res);
        }
        public function info($id) {
            
        }
        public function delete($id) {
            
        }

        public function count(){
            $contem = new Contem();
            $res = $contem->cont();
            echo json_encode($res);
        }
    }
?>