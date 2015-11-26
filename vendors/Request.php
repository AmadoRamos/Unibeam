<?php
	namespace Vendors;
	/**
	* 
	*/
	class Request
	{
		
		public static function all()
	    {
	    	return $_REQUEST;
	    }

	    public static function get($key)
	    {
	    	return $_REQUEST[$key];
	    }
	    public static function isPost()
		{
			if( self::method() == 'POST' )
				return true;
			return false;
		}
		

		public static function method()
		{
			return $_SERVER['REQUEST_METHOD'];
		}
	}

?>