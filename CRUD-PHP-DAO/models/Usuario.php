<?php

class Usuario {
    private $id;
    private $nome;
    private $email;

    //SET E GET

    //ID
    public function setId ($id) {
        $this->id = trim($id);
    }
    public function getId () {
        return $this->id;
    }

    //NOME
    public function setNome ($nome) {
        $this->nome = ucwords(trim($nome));
    }
    public function getNome () {
        return $this->nome;
    }

    //EMAIL
    public function setEmail ($email) {
        $this->email = strtolower(trim($email));
    }
    public function getEmail () {
        return $this->email;
    }

}

interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}