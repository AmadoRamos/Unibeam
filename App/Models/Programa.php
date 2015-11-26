<?php
	namespace App\Models;
	use Vendors\Model;
	/**
	* 
	*/
	class Programa extends Model
	{
		public $table = "programas";

		public function facultad()
		{
			return $this->hasOne('Facultad', 'id_facultades', 'id_facultades'); //Modelo, llave foranea, id local
		}
	}
?>