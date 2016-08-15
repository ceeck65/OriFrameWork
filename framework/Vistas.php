<?php  

	class Vistas {

	protected static $data;

	private static $instancia;

	public function __construct(){
		self::$instancia =&  $this;
	}

    const EXTENSION  = ".php";

	 public static function cargarVista($plantilla)
	 	{
	 		ob_start();
		    include(RUTA_VISTA . $plantilla . self::EXTENSION);
		    $str = ob_get_contents();
		    ob_end_clean();
		    echo $str;
		}

	}