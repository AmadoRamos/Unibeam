<?php
	namespace App\Controller;
	use Vendors\View;
	use Vendors\Redirect;
	use Vendors\Request;
	use App\Models\Facultad;
	/**
	* Controller
	*/
	class FacultadController
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
			$facultad = new Facultad;
			$result =  $facultad->all();

			return View::render("facultades.index", [ 'facultades' => $result ]);
		}

		public function editar($params)
		{
			$facultad 	= new Facultad;
			$result 	=  $facultad->select()->where('id_facultades', $params['id'])->get();
			return View::render("facultades.editar", [ 'facultad' => $result ]);
		}

		public function actualizar($params)
		{
			if( Request::isPost() )
			{
				$facultad 	= new Facultad;
				$facultad->nom_facultades 	= Request::get('nombre');

				$facultad->update('id_facultades', $params['id']);
			}
			Redirect::action('FacultadController@index');
		}

		public function create()
		{
			if( Request::isPost() )
			{
				$data['nom_facultades']	= Request::get('nombre');
				$facultad 				= new Facultad;
				$result 				= $facultad->insert($data);
			}
			
			Redirect::action('FacultadController@index');
		}

		public function eliminar($params)
		{
			$facultad = new Facultad;
			$facultad->delete('id_facultades', $params['id']);
			Redirect::action('FacultadController@index');
		}
		
	}
?>