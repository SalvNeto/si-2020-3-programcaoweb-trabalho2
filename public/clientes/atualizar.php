<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Cliente.php');
require_once(__DIR__ . '/../../dao/DaoCliente.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoCliente = new DaoCliente($conn);
$cliente = $daoCliente->porId( $_POST['id_cliente'] );
    
if ( $cliente )
{  
  $cliente->setNome( $_POST['nome'] );
  $cliente->setEmail( $_POST['email'] );
  $cliente->setEndereco( $_POST['endereco'] );
  $cliente->setCidade( $_POST['cidade'] );
  $cliente->setEstado( $_POST['estado'] );
  $cliente->setSexo( $_POST['sexo'] );
  $daoCliente->atualizar( $cliente );
}

header('Location: ./index.php');