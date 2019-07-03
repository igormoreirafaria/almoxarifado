<?php

	session_start();

    require_once('model/db.class.php');

	$usuario = $_POST['login'];
	$senha = $_POST['senha'];

	$sql = " SELECT cpf, nome, setor FROM FUNCIONARIOS WHERE login = '$usuario' AND senha = '$senha' ";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$resultado_id = mysqli_query($link, $sql);
    
	if($resultado_id){

		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(isset($dados_usuario['cpf'])){

			$_SESSION['cpf'] = $dados_usuario['cpf'];
			$_SESSION['nome'] = $dados_usuario['nome'];
			$_SESSION['setor'] = $dados_usuario['setor'];
			
			header('Location: home.php');

		} else {
			header('Location: /almoxarifado/index.php?erro=1');
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}


	


?>