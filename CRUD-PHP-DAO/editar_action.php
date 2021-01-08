<?php 

require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if ($nome && $email && $id) {

    $usuario = $usuarioDao->findById($id);
    $usuario->setNome($nome);
    $usuario->setEmail($email);


    $usuarioDao->update($usuario);
    
    header("Location: index.php");
    exit;
}
else {
    header("Location: editar.php?id=".$id);
    exit;
}
