<?php

class Libros extends ControladorBase {
    
    private $titulo = "";

    public function __construct($titulo) {
        parent::__construct();
        $this->titulo = $titulo;   
    }

    public function index() {
       
        $libros = ModeloBase::consultar("libros");
        Vistas::cargarVista("libros/libros", $libros);
        
       
    }

    public function registrarNuevo() {
        Vistas::cargarVista("libros/registro");
        
        $datos = array (
            "titulo" => "Test",
            "autor" => "Mario Fernandez",
            "categoria" => "Informatica",
            "enlace"  => "test.pdp"    
        );
        
        ModeloBase::insertarRegistro("libros", $datos);
    }

}
