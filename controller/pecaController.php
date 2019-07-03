<?php

    
    require_once '../model/peca.class.php';
    class pecaController {

        public function listar() {
            
            $peca = new Peca();
            
            $pecas = $peca->listAll();
            
            $res = [];
            foreach ($pecas as $peca) {
                array_push($res, $peca->jsonSerialize());
            }

            echo json_encode($res);

        }
        

        public function atualiza($idAtual, $id , $upc, $descricao) {
            $peca = new peca();
            $peca->construtor($id, $upc, $descricao);
            $func = $peca->editar   ($idAtual);
            echo $func;
            
        }

        public function info($id) {
            $peca = new Peca();
            $pec = $peca->info($id);
            echo json_encode($pec->jsonSerialize());
        }

        public function validaLogin(){
            $peca = new Peca();
            $func = $peca->validaLogin();
            echo json_encode($func);
        }

        public function delete($id) {
            $peca = new Peca();
            $pec = $peca->remove($id);
            echo json_encode($pec);
        }
        public function create($id, $upc, $descricao) {
            $peca = new Peca();
            $peca->construtor($id, $upc, $descricao);
            $pec = $peca->save();
            echo json_encode($pec); 
        }
    }
?>