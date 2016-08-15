<?php  

	class Vistas {

	protected static $data;

    const EXTENSION  = ".php";

	 public function cargarVista($plantilla)
	 	{
	 		ob_start();
		    include(RUTA_VISTA . $plantilla . self::EXTENSION);
		    $str = ob_get_contents();
		    ob_end_clean();
		    echo $str;
	 		}	

	}