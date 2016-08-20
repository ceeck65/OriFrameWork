<?php

class Autores extends ControladorBase {

    public function index() {
        Vistas::cargarVista("autores/index");
    }

    public function test() {
        $args = array("nombre" => "pedro", "edad" => 25);
        Vistas::cargarVista("autores/test", $args);
        BaseDatos::conexion();
    }

    function nuevaPrueba() {
        
    }

}
