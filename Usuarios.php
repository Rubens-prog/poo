<?php
require_once 'Crud.php';

class Usuarios extends Crud {
    protected $table = "users";

    private $nome;
    private $email;

    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    
    public function setEmail($email){
        return $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }

    public function insert(){
       $sql = "INSERT INTO $this->table (nome,email) VALUES (:nome, :email)";
       $stmt = DB::prepare($sql);
       $stmt->bindParam(":nome", $nome);
       $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }
}