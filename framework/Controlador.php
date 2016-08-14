<?php 

	class Controlador {

		public function Index()
		{
			$url = $_SERVER['REQUEST_URI']; 
		    $url = explode('/', $url);
 	
		     $controlador = $url[3];

		      if (isset($url[4])) {
		      	$metodo = $url[4];
		      } else {
		      	$metodo = "index";
		      }

		      $clase_controlador = ucfirst($controlador) . "Controlador";
		      if (file_exists(RUTA_APP . "controladores/" .  $clase_controlador . ".php")) {
			  	
			  	require "aplicacion/controladores/" .$clase_controlador . ".php";
			 	 $objeto = new $clase_controlador;
			    call_user_func(array($clase_controlador, $metodo));
			  } else {
			  	echo NO_CONTROLADOR;
			  }
		}
	} 

	Controlador::Index();

