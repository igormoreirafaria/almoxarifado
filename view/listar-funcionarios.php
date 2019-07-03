<?php
    session_start();

    if(!isset($_SESSION['cpf'])){
        header('Location: index.php?erro=1');
    }
    require_once '../controller/funcionarioController.php';
    
    $obj = new FuncionarioController();
    $obj->listar();

    $funcionarios = $_REQUEST['funcionarios'];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Funcionários | Almoxarifado</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="/almoxarifado/css/materialize.min.css"  media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="/almoxarifado/css/meucss.css"/>

    </head>

    <body>



        <?php include("../componentes/sidenav.html")?>
        <div class="container content z-depth-3">
            <div class="row">
                <div class="container">
                    <table>
                        <thead>
                            <tr>
                                <th>CPF</th>
                                <th>NOME</th>
                                <th>SETOR</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <tr>
                                    <td><?php echo $funcionario->getCpf(); ?></td>
                                    <td><?php echo $funcionario->getNome(); ?></td>
                                    <td><?php echo $funcionario->getSetor(); ?></td>
                                    <td><a href="editar-funcionario.php?cpf=<?php echo $funcionario->getCpf(); ?>"><i class="material-icons">edit</i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="/almoxarifado/js/materialize.min.js"></script>
    </body>
</html>