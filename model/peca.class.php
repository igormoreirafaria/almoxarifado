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

  public function save() {
  // logica para salvar cliente no banco
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    
    $sql = "INSERT INTO PECAS(id, upc, descricao) VALUES($this->id, $this->upc, $this->descricao)";
    mysqli_query($link, $sql);
  }
      
  public function editar($id) {
  // logica para atualizar cliente no banco
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    
    $sql = "UPDATE PECAS SET id = $this->id, upc =$this->upc, descricao = $this->descricao WHERE id = $id";
    mysqli_query($link, $sql);
}
      
  public function remove() {
  // logica para remover cliente do banco
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

    $sql = " SELECT id, upc,descricao FROM PECAS WHERE id=1";
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