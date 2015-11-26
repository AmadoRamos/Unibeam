<?php
	namespace Vendors;
	/**
	* Servidor que ejecuta la funcion correspondiente a la ruta
	*/
	class Server
	{
		public static function init()
		{
			$data  			= Route::get_route();
			if( $data != "404" )
			{
				$t =   sprintf( '\App\Controller\%s' ,$data['controller']) ;

				$class 		= new  $t;
				if( $data['has_arguments'] )
				{
					$output =  $class->{ $data['function'] }( $data['arguments'] );
				}
				else
				{
					$output = $class->{ $data['function'] }();
				}
			} 
			else 
			{
				$output = App\Controller\ErrorsController::_404();
			}
			echo $output;
		}
	}
?>