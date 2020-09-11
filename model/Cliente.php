<?php

class Cliente {

private $id_cliente;
private $nome;
private $email;
private $endereco;
private $cidade;
private $estado;
private $sexo;

public function __construct(string $nome='',string $email = '',string $endereco = '',string $cidade = '',string $estado='',string $sexo='', int $id_cliente=-1) {
    $this->id_cliente = $id_cliente;
    $this->nome = $nome;
    $this->email = $email;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->estado = $estado;
    $this->sexo = $sexo;
}

public function setId(int $id_cliente) {
    $this->id_cliente = $id_cliente;
}

public function getId() {
    return $this->id_cliente;
}

public function setNome(string $nome){
    $this->nome = $nome;
}

public function getNome(){
    return $this->nome;
}

public function setEmail(string $email){
    $this->email = $email;
}

public function getEmail(){
    return $this->email;
}

public function setEndereco(string $endereco){
    $this->endereco = $endereco;
}

public function getEndereco(){
    return $this->endereco;
}

public function setCidade(string $cidade){
    $this->cidade = $cidade;
}

public function getCidade(){
    return $this->cidade;
}

public function setEstado(string $estado){
    $this->estado = $estado;
}

public function getEstado(){
    return $this->estado;
}

public function setSexo(string $sexo){
    $this->sexo = $sexo;
}

public function getSexo(){
    return $this->sexo;
}


};