<?php
	use Vendors\Route;
	/*
		URLs
		para recibir datos por get 
		usaran los corchetes( {} ) para determinar
		el nombre con el cual vamos a trabajar 
		y el que se va a recibir de parametro en la funcion del contructor
		se escribira el nombre sin espacios separando los corchetes y el nombre.
	*/
	
	Route::new_route("/facultades", "FacultadController@index");
	Route::new_route("/facultades/create", "FacultadController@create");
	Route::new_route("/facultades/eliminar/{id}", "FacultadController@eliminar");
	Route::new_route("/facultades/editar/{id}", "FacultadController@editar");
	Route::new_route("/facultades/actualizar/{id}", "FacultadController@actualizar");
	Route::new_route("/", "HolaController@index");
?>