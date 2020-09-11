<?php 
require_once(__DIR__ . '/../model/Cliente.php');
require_once(__DIR__ . '/../db/Db.php');

class DaoCliente {
    
  private $connection;

  public function __construct(Db $connection) {
      $this->connection = $connection;
  }
  
  public function porId(int $id): ?Cliente {
    $sql = "SELECT nome,email,endereco,cidade,estado,sexo,id_cliente FROM clientes where id_cliente = ?";
    $stmt = $this->connection->prepare($sql);
    $cli = null;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      if ($stmt->execute()) {
        $id = 0; $nome = ''; $email = ''; $endreco = ''; $cidade = ''; $estado = ''; $sexo = '';
        $stmt->bind_result($nome,$email,$endereco,$cidade,$estado, $sexo,$id);
        $stmt->store_result();
        if ($stmt->num_rows == 1 && $stmt->fetch()) {
          $cli = new Cliente($nome, $email, $endereco, $cidade, $estado, $sexo, $id);
        }
      }
      $stmt->close();
    }
    return $cli;
  }

  public function inserir(Cliente $cliente): bool {
    $sql = "INSERT INTO clientes (nome,email,endereco,cidade,estado,sexo) VALUES(?,?,?,?,?,?)";
    $stmt = $this->connection->prepare($sql);
    $res = false;
    if ($stmt) {

      $nome = $cliente->getNome();
      $email = $cliente->getEmail();
      $endereco = $cliente->getEndereco();
      $cidade = $cliente->getCidade();
      $estado = $cliente->getEstado();
      $sexo = $cliente->getSexo();

      $stmt->bind_param('ssssss', $nome, $email, $endereco, $cidade,$estado, $sexo);
      if ($stmt->execute()) {
          $id = $this->connection->getLastID();
          $cliente->setId($id);
          $res = true;
      }
      $stmt->close();
    }
    return $res;
  }

  public function remover(Cliente $cliente): bool {
    $sql = "DELETE FROM clientes where id_cliente=?";
    $id = $cliente->getId(); 
    $stmt = $this->connection->prepare($sql);
    $ret = false;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  public function atualizar(Cliente $cliente): bool {
    $sql = "UPDATE clientes SET nome=?, email=?, endereco=?, cidade=?, estado=?, sexo=? WHERE id_cliente = ?";
    $stmt = $this->connection->prepare($sql);
    $ret = false;      
    if ($stmt) {
        
      $nome = $cliente->getNome();
      $email = $cliente->getEmail();
      $endereco = $cliente->getEndereco();
      $cidade = $cliente->getCidade();
      $estado = $cliente->getEstado();
      $sexo = $cliente->getSexo();
      $id_cliente = $cliente->getId();

      $stmt->bind_param('ssssssi', $nome, $email, $endereco, $cidade,$estado, $sexo, $id_cliente);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  public function todos(): array {
    $sql = "SELECT id_cliente, nome, email, endereco, cidade, estado, sexo from clientes";
    $stmt = $this->connection->prepare($sql);
    $clientes = [];
    if ($stmt) {
      if ($stmt->execute()) {
        $id = 0; $nome = ''; $email = ''; $endreco = ''; $cidade = ''; $estado = ''; $sexo = '';
        $stmt->bind_result($id,$nome,$email,$endereco,$cidade,$estado, $sexo);
        $stmt->store_result();
        while($stmt->fetch()) {
          $clientes[] = new Cliente($nome, $email, $endereco, $cidade, $estado, $sexo, $id);
        }
      }
      $stmt->close();
    }
    return $clientes;
  }

};

