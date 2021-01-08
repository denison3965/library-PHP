<?php

require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {

    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }



    public function add(Usuario $u) {

        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );

        return $u;
    } 

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");

        $data = $sql->fetchAll();
        
        //Criando os meus objetos com os usuarios do banco
        foreach ($data as $item) {
            $usuario = new Usuario();

            $usuario->setId($item['id']);
            $usuario->setNome($item['nome']);
            $usuario->setEmail($item['email']);

            $array[] = $usuario;
        }

        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();


        if ($sql->rowCount() > 0){

            $data = $sql->fetch();

            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);

            return $usuario;


        } else {
            return false;
        } 

    }

    public function findByEmail($email) {

        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();


        if ($sql->rowCount() > 0){

            $data = $sql->fetch();

            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setNome($data['nome']);
            $usuario->setEmail($data['email']);

            return $usuario;


        } else {
            return false;
        } 
    }

    public function update(Usuario $u) {

        $sql = $this->pdo->prepare("UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    } 

    public function delete($id) {

        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }


}