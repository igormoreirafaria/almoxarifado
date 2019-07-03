<?php
    // ini_set('display_startup_errors', 1);
    // ini_set('display_errors', 1);
    // error_reporting(-1);
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/funcionarioController.php';
    require_once '../controller/setorController.php';
    
    $objFunc = new FuncionarioController();
    $objFunc->info($_GET['cpf']);
    
    $objSet = new SetorController();
    $objSet->listar();

    $func = $_REQUEST['funcionario'];
    $setores = $_REQUEST['setores'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Editar funcionário | Almoxarifado</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="/almoxarifado/css/materialize.min.css"  media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/almoxarifado/css/meucss.css"/>
        <script>
            $(document).ready(function(){
                $('select').formSelect();

                

            });
        
        
        </script>
    </head>

    <body>



        <?php include("../componentes/sidenav.html")?>
        <div class="container content z-depth-3">
            <div class="row">
                <div class="col s6">
                    <h4>Editando dados de Fulano</h4>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="cpf" type="text" class="validate" value="<?php echo $func->getCpf() ?>">
                    <label for="cpf">CPF</label>
                </div>
                <div class="input-field col s6">
                    <input id="nome" type="text" class="validate" value="<?php echo $func->getNome()?>">
                    <label for="nome">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input id="login" type="text" class="validate" value="<?php echo $func->getLogin()?>">
                    <label for="login">Login</label>
                </div>
                <div class="input-field col s6">
                    <input id="senha" type="password" class="validate" value="<?php echo $func->getSenha()?>">
                    <label for="senha">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <select>
                        <option value="" disabled selected>Escolha uma opção</option>
                        <?php foreach ($setores as $setor): ?>
                            <option value="<?php echo $setor->getId();?>"><?php echo $setor->getNome(); ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Setor</label>
                </div>
            </div>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="/almoxarifado/js/materialize.min.js"></script>
    </body>
</html>