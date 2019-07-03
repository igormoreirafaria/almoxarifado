<?php

class Funcionario {

	
	private $cpf;
	private $nome;
  private $login;
  private $senha;
  private $setor;

  public function construtor($cpf, $nome, $login, $senha, $setor) {
    $this->setCpf($cpf);
    $this->setNome($nome);
    $this->setLogin($login);
    $this->setSenha($senha);
    $this->setSetor($setor);
  }

    //getters e setters
	public function getCpf(){
		return $this->cpf;
  }
  public function setCpf($cpf){
    $this->cpf = $cpf;
  }
    
  public function getNome(){
    return $this->nome;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  
  public function getLogin(){
    return $this->login;
  }
  public function setLogin($login){
    $this->login = $login;
  }
  
  public function getSenha(){
    return $this->senha;
  }
  public function setSenha($senha){
    $this->senha = $senha;
  }
  public function getSetor(){
    return $this->setor;
  }
  public function setSetor($setor){
    $this->setor = $setor;
  }

  public function save() {
  // logica para salvar cliente no banco
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    
    $sql = "INSERT INTO FUNCIONARIOS(cpf, nome, login, senha, setor) VALUES($this->cpf, $this->nome, $this->login, $this->senha, $this->setor)";
    mysqli_query($link, $sql);
  }
      
  public function editar($cpfAtual) {
  // logica para atualizar cliente no banco
    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    $cpf = $this->getCpf();
    $nome = $this->getNome();
    $login = $this->getLogin();
    $senha = $this->getSenha();
    $setor = intVal($this->getSetor());
    
    $sql = "UPDATE FUNCIONARIOS SET cpf = '$cpf', nome = '$nome', login = '$login', senha = '$senha', setor = $setor WHERE cpf = '$cpfAtual'";
    echo $sql;
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

    $sql = " SELECT cpf, nome, login, senha, setor FROM FUNCIONARIOS";
    
    $resultado = mysqli_query($link, $sql);
    
    if($resultado){
      
      $funcionarios = [];
      while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        $func = new Funcionario();
        $func->construtor($registro['cpf'], $registro['nome'], $registro['login'], $registro['senha'], $registro['setor']);
        array_push($funcionarios, $func);
      }
      
      return $funcionarios;
      
  
    } else {
      echo 'Erro ao executar a query';
    }
  }

  public function jsonSerialize(){
      return 
      [
          'cpf'   => $this->getCpf(),
          'nome' => $this->getNome(),
          'login' => $this->getLogin(),
          'senha' => $this->getSenha(),
          'setor' => $this->getSetor()
      ];
  }

  public function info($cpf) {
    // logica para recuperar dados de um funcionario

    require_once('db.class.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = " SELECT cpf, nome, login, senha, setor FROM FUNCIONARIOS WHERE cpf = $cpf ";

    $resultado = mysqli_query($link, $sql);

    if($resultado){
      
      $registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
      $func = new Funcionario();
      $func->construtor($registro['cpf'], $registro['nome'], $registro['login'], $registro['senha'], $registro['setor']);
      
      return $func;
    
    } else {
      echo 'Erro ao executar a query';
    }
  }
}

?>