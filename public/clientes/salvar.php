<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Cliente.php');
require_once(__DIR__ . '/../../dao/DaoCliente.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoCliente = new DaoCliente($conn);
$daoCliente->inserir( new Cliente($_POST['nome'],$_POST['email'],$_POST['endereco'],$_POST['cidade'],$_POST['estado'],$_POST['sexo']));
    
header('Location: ./index.php');

?>


