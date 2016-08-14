<?php 

	/**
	* 
	*/
	class Modelo extends BaseDatos
	{
		
		public function conectar()
		{
		   	$conectar =  BaseDatos::conexion();
		      if ($conectar) {
		      	echo "Se conecto";
		      } else {
		      	echo "No se conecto";
		      }
		}


		
		 
	}


//	Modelo::conectar();


 	
