<?php

class Post {
    public int $likes = 0;
    public array $comments = [];
    private string $author;

    public function __construct() {
        $this->likes = 5;
        $this->comments = ['Não há comentarios nesse post'];
    }

    public function aumentarLike() {
        $this->likes++;
    }

    //SET e GET / Encapusulamento

    public function setAuthor($n) {
        $this->author = ucfirst($n);
    }

    public function getAuthor() {
        return $this->author;
    }

}

$post1 = new Post();
$post1->setAuthor('bonieky');

$post2 = new Post();
$post2->setAuthor('denison');


echo "POST 1: ".$post1->likes." likes - ".$post1->getAuthor().'<br>';
echo "POST 2: ".$post2->likes." likes - ".$post2->getAuthor().'<br>';

echo 'Exemplo do construtor'.'<br><br>';

echo "POST 1 comentarios : ".$post1->comments[0]."<br>";
echo "POST 2 comentarios : ".$post2->comments[0]."<br>";


