<?php

    class Setor{

        private $id;
        private $nome;
        private $gerente;

        public function construtor($id, $nome, $gerente) {
            $this->setId($id);
            $this->setNome($nome);
            $this->setGerente($gerente);
          }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getGerente(){
            return $this->gerente;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setGerente($gerente){
            $this->gerente = $gerente;
        }



        public function save() {
            // logica para salvar setor no banco
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();

            $nome = $this->getNome();
            $gerente = $this->getGerente();

            $sql = "INSERT INTO SETOR(nome, gerente) VALUES('$nome', '$gerente')";

            $resultado = mysqli_query($link, $sql);
            
            if($resultado){
                echo "Sucesso";
            } else {
                echo 'Erro ao executar a query';
            }
        }
                
        public function editar() {
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();

            $id = intVal($this->getId());
            $nome = $this->getNome();
            $gerente = $this->getGerente();

            $sql = "UPDATE SETOR SET id = $id, nome = '$nome', gerente = '$gerente' WHERE id = '$id'";

            $resultado = mysqli_query($link, $sql);
            
            if($resultado){
                echo "Sucesso";
            } else {
                echo 'Erro ao executar a query';
            }
        }
                
        public function remove($id) {
        // logica para remover setor do banco
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
        
            $sql = "DELETE FROM SETOR WHERE id = $id";
            $result = mysqli_query($link, $sql);
            if($result){
                echo "Sucesso";
            }else{
                echo 'Erro ao executar a query';
            }
        }
        public function jsonSerialize(){
            return 
            [
                'id'   => $this->getId(),
                'nome' => $this->getNome(),
                'gerente' => $this->getGerente(),
            ];
        }
            
        public function listAll() {
        // logica para listar toodos os setores do banco
        

            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
            
            $sql = " SELECT * FROM SETOR;";

            $resultado = mysqli_query($link, $sql);
            
            if($resultado){
                
                
                $setores = [];
                while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $setor = new Setor();
                    $setor->construtor($registro['id'], $registro['nome'], $registro['gerente']);
                    array_push($setores, $setor);
                }
                return $setores;
            
            } else {
                echo 'Erro ao executar a query';
            }
        }
          
        public function info($id) {
            // logica para recuperar dados de um setor
        
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
        
            $sql = " SELECT id, nome, gerente FROM SETOR WHERE id = $id ";
        
            $resultado = mysqli_query($link, $sql);
        
            if($resultado){
              
              $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
              $set = new Setor();
              $set->construtor($registro['id'], $registro['nome'], $registro['gerente']);
              
              return $set;
            
            } else {
              echo 'Erro ao executar a query';
            }
          }


    }

?>