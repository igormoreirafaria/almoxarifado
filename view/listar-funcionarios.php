<?php

    require_once '../controller/funcionarioController.php';
    
    $obj = new FuncionarioController();
    $obj->listar();

    $funcionarios = $_REQUEST['funcionarios'];
?>


<?php include("../componentes/head.html")?>
<?php include("../componentes/sidenav.html")?>
<div class="container content">
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
<?php include("../componentes/footer.html")?>
        