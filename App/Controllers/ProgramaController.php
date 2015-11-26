<?php
	namespace App\Controller;
	use Vendors\View;
	use Vendors\Redirect;
	use Vendors\Request;
	use App\Models\Programa as Entity;
	use App\Models\Facultad;
	/**
	* Controller
	*/
	class ProgramaController
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
			$entity = new Entity;
			$facultad = new Facultad;
			$result =  $entity->all();
			$facultades = $facultad->all();
			return View::render("programas.index", [ 'entities' => $result, 'facultades' => $facultades ]);
		}

		public function editar($params)
		{
			$facultad = new Facultad;
			$facultades = $facultad->all();

			$entity 	= new Entity;
			$result 	=  $entity->select()->where('id_programas', $params['id'])->get();
			return View::render("programas.editar", [ 'entity' => $result, 'facultades' => $facultades ]);
		}

		public function actualizar($params)
		{
			if( Request::isPost() )
			{
				$facultad 	= new Entity;
				$facultad->nom_programas 	= Request::get('nombre');
				$facultad->id_facultades 	= Request::get('id_facultades');

				$facultad->update('id_programas', $params['id']);
			}
			Redirect::action('ProgramaController@index');
		}

		public function create()
		{
			if( Request::isPost() )
			{
				$data['nom_programas']	= Request::get('nombre');
				$data['id_facultades']	= Request::get('id_facultades');
				$entity 				= new Entity;
				$result 				= $entity->insert($data);
			}
			
			Redirect::action('ProgramaController@index');
		}

		public function eliminar($params)
		{
			$facultad = new Entity;
			$facultad->delete('id_programas', $params['id']);
			Redirect::action('ProgramaController@index');
		}
		
	}
?>