<?php
	
	session_start();

	if(!isset($_SESSION['cpf'])){
		header('Location: index.php?erro=1');
	}

    require_once('model/db.class.php');
    
    $objDb = new db();
	$link = $objDb->conecta_mysql();

    $id_usuario = $_SESSION['id_usuario'];
    $setor = $_SESSION['setor'];

	//--recupera setor nome
    $sql = " SELECT nome FROM SETOR WHERE id = $setor ";
    $resultado = mysqli_query($link, $sql);
    $nome_setor = "";
    
    if($resultado){
        $registro = mysqli_fetch_array($resultado);
        
        if($registro){
            $_SESSION['nome_setor'] = $registro['nome'];

        }
	} else {
		echo 'Erro ao executar a query';
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Home | Almoxarifado</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="css/meucss.css"/>

        

       
    </head>

    <body>
        <?php include("componentes/sidenav.html")?>
        

        <div class="container z-depth-3 content grande" >
        
                <div class="row">
                    <div class="col s6 offset-s3" style="text-align: center">
                        <h3>Bem Vindo ao Sistema do Almoxarifado.</h3>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row">
                    <div class="col s2 offset-s3">
                            <a class="color-white" href="/almoxarifado/view/listar-funcionarios.html">
                                <div class="custom-but z-depth-3 center light-blue darken-3">
                                    <i class="material-icons large">person</i>
                                    <br>
                                    <p>Funcionários</p>
                                </div>
                            </a>
                    </div>
                </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>