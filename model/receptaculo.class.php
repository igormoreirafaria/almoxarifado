<?php

    class Receptaculo{

        private $id;
        private $corredor;
        

        public function construtor($id, $corredor) {
            $this->setId($id);
            $this->setCorredor($corredor);
          }

        public function getId(){
            return $this->id;
        }

        public function getCorredor(){
            return $this->corredor;
        }

        

        public function setId($id){
            $this->id = $id;
        }

        public function setCorredor($corredor){
            $this->corredor = $corredor;
        }

        public function save() {
            // logica para salvar Receptaculo no banco
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
            $cpf = $this->getCpf();
            $nome = $this->getNome();
            $login = $this->getLogin();
            $senha = $this->getSenha();
            $setor = intVal($this->getSetor());
            
            $sql = "INSERT INTO FUNCIONARIOS(cpf, nome, login, senha, setor) VALUES('$cpf', '$nome', '$login', '$senha', $setor)";
            $result = mysqli_query($link, $sql);

            if($result){
            return "Sucesso";
            }else{
            echo 'Erro ao executar a query';
            }
        }
                
        public function editar() {
            
        }
                
        public function remove($id) {
        
        }
        public function jsonSerialize(){
            return 
            [
                'id'   => $this->getId(),
                'corredor' => $this->getCorredor(),
                
            ];
        }
            
        public function listAll() {
        // logica para listar toodos os receptaculo do banco
            
        require_once('db.class.php');
        $objDb = new db();
        $link = $objDb->conecta_mysql();
        
        $sql = " SELECT * FROM RECEPTACULO;";

        $resultado = mysqli_query($link, $sql);
        
        if($resultado){
            
            
            $receptaculos = [];
            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $rec = new Receptaculo();
                $rec->construtor($registro['id'], $registro['corredor']);
                array_push($receptaculos, $rec);
            }
            return $receptaculos;
        
        } else {
            echo 'Erro ao executar a query';
        }

            
        }
          
        public function info($id) {
        }


    }

?>