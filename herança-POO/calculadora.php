<?php

    class Calculadora {
        
        private $total = 0;

        function add ($n) {
            $this->total = $this->total + $n;
        }

        function sub ($n) {
            $this->total = $this->total - $n;
        }

        function multiply ($n) {
            $this->total = $this->total * $n;
        }

        function divide ($n) {
            $this->total = $this->total / $n;
        }

        function getTotal () {
            return $this->total;
        }

        function clear () {
            $this->total = 0 ;
        }

    }