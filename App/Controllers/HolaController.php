<?php
	namespace App\Controller;
	use Vendors\View;
	/**
	* Controller
	*/
	class HolaController
	{
		/*
			si la funcion recibe argumentos estos seran enviados en un unico
			ARRAY asociativo, donde el key de los datos seran los nombres 
			que hayan sido nombrado en las rutas
			"/hola/{mensaje}" => "HolaController@hola"
			se recivira un array asociativo con una unica posicion y donde 
			el key sera "mensaje"
			$array["mensaje"]
			SOLO ENVIAR COMO PARAMETRO A LAS VISTAS ARRAYs
		*/
		public function index()
		{
			
			return View::render("index", [ 'msg' => "Amado Ramos" ]);
		}
		public function hola($argv)
		{
			return View::render("hola.index", $argv );
		}
		public function hola2($argv)
		{
			return View::render("hola.mundo", $argv );
		}
		
		
	}
?>