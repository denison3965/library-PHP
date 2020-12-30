<?php

//Metodos estaticos

class Matematica {

    public static function somar ($x, $y) {
        return $x + $y;
    }
}

echo Matematica::somar(50, 20);