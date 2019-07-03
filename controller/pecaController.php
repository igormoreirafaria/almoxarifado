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

        public function update() {
            
            echo "entra";
            
        }

        public function atualiza($idAtual, $upc, $descricao) {
            $peca = new peca();
            $peca->construtor($id, $upc, $descricao);
            $func = $peca->editar($idAtual);
            echo $func;
            
        }

        public function info($id) {
            $peca = new Peca();
            $pec = $peca->info($id);
            echo json_encode($pec->jsonSerialize());
        }

        public function validaLogin(){
            $peca = new peca();
            $func = $peca->validaLogin();
            echo json_encode($func);
        }
    }
?>