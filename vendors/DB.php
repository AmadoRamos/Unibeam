<?php
	namespace Vendors;
	/**
	* Conexion a la base de datos
	*/
	class DB
	{
		
		public static function connect($db="unibeam" ,$user='root', $pass="")
		{
			mysql_connect("localhost",$user,$pass) or die('No se pudo conectar: ' . mysql_error());
			mysql_select_db($db) or die('No se pudo seleccionar la base de datos');
		}

		public static function query($sql)
	    {
	    	self::connect();
	    	$result = mysql_query($sql);
	    	if( !mysql_error() ){
	    		return $result;
	    	}
	    	return mysql_error();
	    }
	}

?>