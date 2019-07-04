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
        public function contar() {
            $setor = new Setor();
            
            $res = $setor->contar();
            
            echo json_encode($res);

        }
        public function update($id, $nome, $gerente) {
            $setor = new Setor();
            $set = $setor->construtor($id, $nome, $gerente);
            $set = $setor->editar();
            echo json_encode($set);
        }
        public function create($nome, $gerente) {
            $setor = new Setor();
            $setor->setNome($nome);
            $setor->setGerente($gerente);
            $set = $setor->save();
            echo json_encode($set);
        }
        public function info($id) {
            $setor = new Setor();
            $set = $setor->info($id);
            echo json_encode($set->jsonSerialize());
        }
        public function delete($id) {
            $setor = new Setor();
            $set = $setor->remove($id);
            echo json_encode($set);
        }


    }
?>