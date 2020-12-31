<?php

class Post {
    private int $id;
    private int $likes;

    //ID - SET GET
    public function setId($i) {
        $this->id = $i;
    }

    public function getId() {
        return $this->id;
    }

    //Like - SET GET
    public function setLikes($n) {
        $this->likes = $n;
    }

    public function getLikes() {
        return $this->likes;
    }
}

class Foto extends Post {
    private $url = '';

    public function __construct($id) {
        $this->setId($id);
    }

    //Url - SET GET 

    public function setUrl ($url) {
        $this->url = $url;
    }

    public function getUrl () {
        return $this->url;
    }

}

$foto = new Foto(15);

$foto->setLikes(685);
$foto->setUrl('https://abc.com.br');


echo 'FOTO - #'.$foto->getId().' - Likes : '.$foto->getLikes().' URL : '.$foto->getUrl();