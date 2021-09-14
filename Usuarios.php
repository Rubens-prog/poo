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
       $stmt->bindParam(":nome", $this->nome);
       $stmt->bindParam(":email", $this->email);
        return $stmt->execute();
    }

    public function update($id){
        $sql = "UPDATE $this->table SET nome = :nome, email= :email, WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function delete($id){
        $sql= "Delete from $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}