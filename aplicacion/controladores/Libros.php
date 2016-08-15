<?php

	class Libros extends Controlador {

		public  function index()
		{
			Vistas::cargarVista("libros/libros");
		}

		public function RegistrarLibros($parametos)
		{
			// $this->Vista()->cargarVista("libros/

			echo $parametos;

			$classObj = new Vistas();
			$classObj->cargarVista("libros/registrar");


		}

	}
