<?php
require_once 'BD.php';

abstract class Crud extends DB {
    protected $table;

    abstract public function insert();
    abstract public function update($id);

    public function find($id){
        $sql= "SELECT * FROM $this->table WHERE id = :id";
        $stmt= DB::prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function findAll(){
        $sql = "SELECT * FROM  $this->table";
        $stmt =  DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = DB::prepare($sql);
        $stmt->execute();
    }
}