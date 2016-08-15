<?php

	class Libros extends Controlador {

		public function index()
		{
				Vistas::cargarVista("libros/libros");
		}

		public function RegistrarLibros()
		{
			Vistas::cargarVista("libros/registrar");
		}

	}
