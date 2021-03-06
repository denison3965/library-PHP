<?php

require 'config.php';

$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    //Montando o scheema da query 
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->execute();

    header("Location: index.php");
    exit;


}else{

    header("Location: adicionar.php");
    exit;
}