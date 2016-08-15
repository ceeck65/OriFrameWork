<?php

class Controlador
{

    private static $instance;


    public function __construct()
    {
        self::$instance =& $this;
    }


    public function Index()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);

        $controlador = $url[1];
        $metodo = $url[2];

        if (isset($controlador)) {
            $controlador;
        } elseif (empty($controlador)) {
            $controlador = "Index";
        }

        if (isset($metodo)) {
            $metodo;
        } else {
            $metodo = "Index";
        }

        $clase_controlador = ucfirst($controlador);
        if (file_exists(RUTA_CONTROLADORES . $clase_controlador . ".php")) {
            require "aplicacion/controladores/" . $clase_controlador . ".php";
            $metodos = get_class_methods($clase_controlador);

            if (in_array($this->MetodoCamello($metodo), $metodos)) {
                call_user_func(array($clase_controlador, $this->MetodoCamello($metodo)));
            } else if ($metodo = "Index") {
                call_user_func(array($clase_controlador, "Index"));
            } else {
                echo MENSAJE_NO_METODO;
            }
        } else {
            echo NO_CONTROLADOR;
        }
    }

    public static function MetodoCamello($value)
    {

        if ($pos = strrpos($value, "-")) {
            return ucfirst(preg_replace("/\-(.)/e", "strtoupper('\\1')", $value));
        }
        if ($pos = strrpos($value, "_")) {
            //	return ucfirst(preg_replace_callback("/\_(.)/e","strtoupper('\\1')", $value));
            return $str[$pos + 1] = strtoupper($value[$pos + 1]);
        }

    }



}

$index = new Controlador();
$index->Index();


