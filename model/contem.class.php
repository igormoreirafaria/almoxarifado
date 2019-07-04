<?php

    class Contem{

        private $receptaculo;
        private $pecas;
        

        public function construtor($receptaculo, $pecas) {
            $this->setReceptaculo($receptaculo);
            $this->setPecas($pecas);
          }

        public function getReceptaculo(){
            return $this->receptaculo;
        }

        public function getPecas(){
            return $this->pecas;
        }

        

        public function setReceptaculo($receptaculo){
            $this->receptaculo = $receptaculo;
        }

        public function setPecas($pecas){
            $this->pecas = $pecas;
        }

        public function save() {
            // logica para salvar Receptaculo no banco
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
            $receptaculo = $this->getReceptaculo();
            $sql = "SELECT `id` FROM PECAS ORDER BY `id` DESC LIMIT 1 ";
            $id = mysqli_query($link, $sql);
            $pecas = mysqli_fetch_array($id, MYSQLI_ASSOC);
            $aux = $pecas['id'];
            $sql = "INSERT INTO CONTEM(receptaculo, pecas) VALUES($receptaculo, $aux)";
            $result = mysqli_query($link, $sql);

            if($result){
                echo "Sucesso";
            }else{
                echo 'Erro ao executar a query';
            }
        }
                
        public function editar() {
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
            $receptaculo = $this->getReceptaculo();
            $pecas = $this->getPecas();
            $sql = "UPDATE CONTEM SET receptaculo = $receptaculo WHERE pecas = $pecas";
            $result = mysqli_query($link, $sql);

            if($result){
                echo "Sucesso";
            }else{
                echo 'Erro ao executar a query';
            }
        }
                
        public function remove($id) {
        
        }
        public function jsonSerialize(){
            return 
            [
                'receptaculo'   => $this->getReceptaculo(),
                'pecas' => $this->getPecas(),
                
            ];
        }
            
        public function listAll() {
        // logica para listar toodos os receptaculo do banco
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
        
            $sql = " SELECT receptaculo, pecas FROM CONTEM";
            
            $resultado = mysqli_query($link, $sql);
            
            if($resultado){
            
            $peca = [];
            while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                $pec = new Contem();
                $pec->construtor($registro['receptaculo'], $registro['pecas']);
                array_push($peca, $pec);
            }
            
            return $peca;
            
        
            } else {
            echo 'Erro ao executar a query';
            }
        }
        public function local() {
            // logica para listar toodos os receptaculo do banco
                require_once('db.class.php');
                $objDb = new db();
                $link = $objDb->conecta_mysql();
            
                $sql = " SELECT c.id as cid , r.id as rid FROM CORREDOR AS c JOIN RECEPTACULO AS r ON c.id = r.corredor";
                
                $resultado = mysqli_query($link, $sql);
                
                if($resultado){
                
                    $peca = [];
                    while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                        $res = array('corredor' => $registro['cid'], 'receptaculo' => $registro['rid']);
                        array_push($peca, $res);
                    }
                    
                    return $peca;
                
            
                } else {
                    echo 'Erro ao executar a query';
                }
            }
          
        public function cont() {
            require_once('db.class.php');
            $objDb = new db();
            $link = $objDb->conecta_mysql();
        
            $sql = "SELECT R.id, count(P.id) FROM RECEPTACULO AS R JOIN CONTEM AS C ON R.id = C.receptaculo JOIN PECAS AS P ON C.pecas = P.id GROUP BY R.id";
            $resultado = mysqli_query($link, $sql);
            if($resultado){
                $count = [];
                while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $res = array('receptaculo' => $registro['id'], 'numero' => $registro['count(P.id)']);
                    array_push($count, $res);
                }
                
                return $count;
            } else {
                echo 'Erro ao executar a query';
            }
        }

        
    }

?>