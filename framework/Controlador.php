<?php

	class Controlador {

		public function Index()
		{
		   	$url = $_SERVER['REQUEST_URI'];
		    $url = explode('/', $url);

		     $controlador = $url[3];

		      if (isset($url[4])) {
		      	$metodo = $url[4];
		      }
		       else {
		      	$metodo = "Index";
		      }

					if (isset($url[3])) {
						$controlador = $url[3];
					} else {
						$controlador = "Inicio";
					}

		      $clase_controlador = ucfirst($controlador);
		      if (file_exists(RUTA_CONTROLADORES .  $clase_controlador . ".php")) {
							require "aplicacion/controladores/" .$clase_controlador . ".php";
							$metodos = get_class_methods($clase_controlador);
								if (in_array(Controlador::MetodoCamello($metodo), $metodos)) {
											call_user_func(array($clase_controlador, Controlador::MetodoCamello($metodo)));
								}
								else if ($metodo = "Index") {
									call_user_func(array($clase_controlador, $metodo));
								}
								else {
									 echo MENSAJE_NO_METODO;
								}
				  } else {
				  	echo NO_CONTROLADOR;
				  }
		}

		public function MetodoCamello($value)
		{
			if(strrpos($value, "-")){
				return ucfirst(preg_replace("/\-(.)/e","strtoupper('\\1')", $value));
			}
			if(strrpos($value, "_")){
				return ucfirst(preg_replace("/\_(.)/e","strtoupper('\\1')", $value));
			}

		}
	}

	Controlador::Index();
