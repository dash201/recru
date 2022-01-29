<?php 

namespace Models;

class Entreprise extends Model{

    protected $table = 'entreprise';

    public function insert(array $tab){
        $sql = $this->pdo->prepare("INSERT INTO {$this->table} (raison_social, mail, tel, pwd) Values(?,?,?,?)");
        $sql->execute($tab);
        //return $sql->lastInsertId;
    }
}