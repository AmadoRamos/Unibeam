<?php
	namespace App\Models;
	use Vendors\Model;
	/**
	* 
	*/
	class Facultad extends Model
	{
		public $table = "facultades";

		public function programas()
		{
			return $this->hasMany('Programa', 'id_facultades', 'id_facultades'); //Modelo, llave local, llave foranea
		}
	}
?>