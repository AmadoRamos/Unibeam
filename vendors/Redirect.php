<?php
	namespace Vendors;
	/**
	* Redireccionar a una ruta especifica
	*/
	class Redirect
	{
		
		public static function action($controller)
	    {
	    	$action = action($controller);
	    	header("Location: {$action}");
	    }
	}

?>