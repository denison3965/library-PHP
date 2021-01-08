<?php

require 'config.php';
require './dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $email) {


    //Verificando se há um email já existente no banco
    if ($usuarioDao->findByEmail($email) === false) {

        //Criando objeto do usuario
        $novoUsuario = new Usuario();

        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        //Criando usuario no banco de dados
        $usuarioDao->add($novoUsuario);

        header("Location: index.php");
        exit;
    }
    else {
        header("Location: adicionar.php");
        exit;
    }

    echo "ola";

} else {

    header("Location: adicionar.php");
    exit;
}
