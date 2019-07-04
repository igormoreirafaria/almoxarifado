<?php

class Peca {

	
	private $id;
	private $upc;
  private $descricao;

  public function construtor($id, $upc, $descricao) {
    $this->setId($id);
    $this->setUpc($upc);
    $this->setDescricao($descricao);
  }

    //getters e setters
	public function getId(){
		return $this->id;
  }
  public function setId($id){
    $this->id = $id;
  }
    
  public function getUpc(){
    return $this->upc;
  }
  public function setUpc($upc){
    $this->upc = $upc;
  }
  
  public function getDescricao(){
    return $this->descricao;
  }
  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }
  

  public function getLocal($id){
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT c.id AS cid, r.id AS rid FROM CORREDOR AS c JOIN RECEPTACULO AS r on c.id = r.corredor JOIN CONTEM AS contem on contem.receptaculo = r.id JOIN PECAS AS p ON p.id = contem.pecas WHERE p.id = $id;";

    $result = mysqli_query($link, $sql);
    if($result){
      
      $registro = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      $local = array('corredor' => $registro['cid'], 'receptaculo' => $registro['rid']);  
      return $local;
      
    } else {
      echo 'Erro ao executar a query';
    }
  }  

  public function editar($idAtual) {
  // logica para atualizar cliente no banco
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $upc = $this->getUpc();
    $descricao = $this->getDescricao();



    
    $sql = "UPDATE PECAS SET upc ='$upc', descricao = '$descricao' WHERE id = $idAtual";
    $result = mysqli_query($link, $sql);
    if($result){
      echo "Sucesso";
    }else{
      echo "Erro ao executar query";
    }
}

  public function remove($id) {
    // logica para remover peça do banco
      require_once('db.class.php');
      $objDb = new db();
      $link = $objDb->conecta_mysql();
  
      $sql = "DELETE FROM `PECAS` WHERE id = $id";
      $result = mysqli_query($link, $sql);
      if($result){
        return "Sucesso";
      }else{
        echo 'Erro ao executar a query';
      }
  }

  public function save() {
    // logica para salvar peça no banco
      require_once('db.class.php');
      $objDb = new db();
      $link = $objDb->conecta_mysql();
      $upc = $this->getUpc();
      $descricao = $this->getDescricao();
      echo "aaaaa $upc";
      $sql = "INSERT INTO PECAS(upc, descricao) VALUES('$upc', '$descricao')";
      $result = mysqli_query($link, $sql);

      if($result){
        
        return "Sucesso";
      }else{
        echo 'Erro ao executar a query';
      }
    }
      
  public function listAll() {
  // logica para listar toodos os clientes do banco

    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " SELECT id, upc, descricao FROM PECAS";
    
    $resultado = mysqli_query($link, $sql);
    
    if($resultado){
      
      $peca = [];
      while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $pec = new Peca();
        $pec->construtor($registro['id'], $registro['upc'], $registro['descricao']);
        array_push($peca, $pec);
      }
      
      return $peca;
      
  
    } else {
      echo 'Erro ao executar a query';
    }
  }

  public function jsonSerialize(){
      return 
      [
          'id'   => $this->getId(),
          'upc' => $this->getUpc(),
          'descricao' => $this->getDescricao()
      ];
  }

  public function info($id) {
    // logica para recuperar dados de um Peca

    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();
  
    $sql = " SELECT id, upc,descricao FROM PECAS WHERE id= $id ";
    //$sql = " SELECT f.id, f.upc as fnome, f.login, f.senha, s.nome as snome FROM PECA as f JOIN SETOR AS s on f.setor = s.id WHERE f.id = $id ";


    $resultado = mysqli_query($link, $sql);

    if($resultado){
      
      $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      $pec = new Peca();
      $pec->construtor($registro['id'], $registro['upc'], $registro['descricao']);
      
      return $pec;
    
    } else {
      echo 'Erro ao executar a query';
    }
  }
}

?>