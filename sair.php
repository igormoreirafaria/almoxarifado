<?php

session_start();

unset($_SESSION['cpf']);
unset($_SESSION['nome']);
unset($_SESSION['setor']);

header('Location: index.php');

?>