<?php

interface Database {
    public function listarProdutos();
    public function adicionarProduto();
    public function alterarProduto();
}

class Mysql implements Database {
    public function listarProdutos() {

    }

    public function adicionarProduto() {

    }

    public function alterarProduto() {

    }
}

class OracleDB implements Database {
    public function listarProdutos() {

    }

    public function adicionarProduto() {

    }

    public function alterarProduto() {

    }
}

//Aqui, na classe abaixo nos teremos um erro, pois a classe mongo, 
// esta implementada na interface do Database, com isso todos os metodos listados no Database interface
// defem também estar presente nas classes que implementarem essa interface, assim padronizando, e organizando,
// o código.

class MongoDB implements Database {
    public function listarProdutos() {

    }

    //NÃO ADICIONOU O adicionarPriduto()

    public function alterarProduto() {

    }
}