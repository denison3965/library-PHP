<?php

//Aqui nos temos um exemplo de polimorfismo, que é parecido com o mesmo conceito de interfaces

interface Forma {
    public function getTipo();
    public function getArea();
}

class Quadrado implements Forma {

    private $largura;
    private $altura;

    public function __construct($l, $a) {
        $this->largura = $l;
        $this->altura = $a;
    }

    public function getTipo() {
        return 'Quadrado';
    }

    public function getArea() {
        return $this->largura * $this->altura;
    }

}

class Circulo implements Forma {
    private $raio;

    public function __construct($r) {
        $this->raio = $r;
    }

    public function getTipo() {
        return 'Circulo';
    }

    public function getArea() {
        return pi() * ($this->raio * $this->raio);
    }
}

$quadrado = new Quadrado(7,7);
$circulo = new Circulo(2);

$objetos = [
    $quadrado,
    $circulo
];

foreach ($objetos as $objeto) {
    $tipo = $objeto->getTipo();
    $area = $objeto->getArea();

    echo 'AREA do '.$tipo.' : '.$area.'<br>';
}
